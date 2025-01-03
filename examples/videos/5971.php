<?php

// Secure MySQL connection using mysqli_ssl_set()
function connectWithSSL($host, $user, $password, $dbname) {
    // Create a new MySQLi instance
    $mysqli = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_error);
    }

    // Set SSL options
    $certPath = '/path/to/client-cert.pem';
    $keyPath = '/path/to/client-key.pem';
    $caPath = '/path/to/ca-cert.pem';

    // Set SSL options
    if (!$mysqli->ssl_set($keyPath, $certPath, $caPath, null, null)) {
        die('Failed to set SSL: ' . $mysqli->error);
    }

    // Reconnect to apply SSL settings
    if (!$mysqli->real_connect($host, $user, $password, $dbname, null, null, MYSQLI_CLIENT_SSL)) {
        die('Failed to connect with SSL: ' . $mysqli->connect_error);
    }

    // Your query logic here...
    // Example: $result = $mysqli->query("SELECT * FROM your_table");

    // Close connection
    $mysqli->close();
}

// Main execution
$host = 'your_host';
$user = 'your_user';
$password = 'your_password';
$dbname = 'your_database';
connectWithSSL($host, $user, $password, $dbname);

?>