<?php
// Check if the current connection is not secure
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    // Redirect to the HTTPS version of the URL
    $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect_url", true, 301);
    exit();
}

// Function to check SSL certificate validity
function isSSLCertificateValid($domain) {
    $stream = stream_context_create([
        "ssl" => [
            "verify_peer" => true,
            "verify_peer_name" => true,
            "allow_self_signed" => false
        ]
    ]);
    // Get SSL info
    $result = stream_socket_client("ssl://$domain:443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $stream);
    if (!$result) {
        return false; // SSL certificate is not valid
    }
    // Get certificate details
    $params = stream_context_get_params($result);
    $cert = openssl_x509_parse($params['options']['ssl']['peer_certificate']);
    return isset($cert['validTo_time_t']) && ($cert['validTo_time_t'] > time());
}

// Example usage of the SSL check
$domain = $_SERVER['HTTP_HOST'];
if (!isSSLCertificateValid($domain)) {
    echo "Warning: The SSL certificate for $domain is not valid!";
}

// Always include HSTS header to enforce HTTPS
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");

// Use secure cookies
ini_set('session.cookie_secure', '1'); // Cookies only sent over HTTPS
ini_set('session.cookie_httponly', '1'); // Prevent JavaScript access

// Start the session
session_start();
// Your application logic goes here
?>