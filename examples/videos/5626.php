<?php

// Example: Using openssl_x509_fingerprint() to verify X.509 certificates

// Load an X.509 certificate from a file
$certFile = '/tmp/test/certificate.crt'; // Path to your certificate file

// Read the certificate
$certificate = file_get_contents($certFile);

if ($certificate === false) {
    die("Error reading certificate file.");
}

// Get the fingerprint of the certificate
$fingerprint = openssl_x509_fingerprint($certificate, 'sha256');

if ($fingerprint === false) {
    die("Error generating fingerprint.");
}

// Output the fingerprint
echo "The SHA-256 fingerprint of the certificate is: " . $fingerprint . "\n";

// Now, you can compare this fingerprint with others
$knownFingerprint = 'AA:BB:CC:DD:EE:FF:00:11:22:33:44:55:66:77:88:99:00:AA:BB:CC:DD:EE:FF:00:11:22'; // Example known fingerprint

if (strcasecmp($fingerprint, $knownFingerprint) === 0) {
    echo "The certificate is verified successfully!\n";
} else {
    echo "The certificate does not match known fingerprint.\n";
}

// Handle further logic such as saving or displaying certificate details

?>