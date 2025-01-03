<?php

// Example 1: Setting a MySQL connection timeout with mysqli_options

$mysqli = new mysqli();

// Set a 5-second connection timeout before opening the connection
mysqli_options($mysqli, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

// Now attempt to connect to the database
$mysqli->real_connect('localhost', 'username', 'password', 'database');

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Example 2: Using SSL with mysqli_options to secure the connection

$mysqli_ssl = new mysqli();

// Specify the SSL key, certificate, and CA
mysqli_options($mysqli_ssl, MYSQLI_OPT_SSL_KEY, '/tmp/test/client-key.pem');
mysqli_options($mysqli_ssl, MYSQLI_OPT_SSL_CERT, '/tmp/test/client-cert.pem');
mysqli_options($mysqli_ssl, MYSQLI_OPT_SSL_CA, '/tmp/test/ca-cert.pem');

// Establish an SSL connection to the database
$mysqli_ssl->real_connect('localhost', 'username', 'password', 'database');

if ($mysqli_ssl->connect_errno) {
    die("SSL connection failed: " . $mysqli_ssl->connect_error);
}

// Example 3: Enabling compression for a MySQL connection

$mysqli_compressed = new mysqli();

// Enable compression to reduce data transfer sizes for large queries
mysqli_options($mysqli_compressed, MYSQLI_OPT_COMPRESS, 1);

// Connect with compression enabled
$mysqli_compressed->real_connect('localhost', 'username', 'password', 'database');

if ($mysqli_compressed->connect_errno) {
    die("Failed to connect with compression: " . $mysqli_compressed->connect_error);
}

// Example 4: Handle large datasets by increasing net_read_timeout and net_write_timeout

$mysqli_large_data = new mysqli();

// Set timeout for reading from or writing to the network
mysqli_options($mysqli_large_data, MYSQLI_OPT_READ_TIMEOUT, 60);
mysqli_options($mysqli_large_data, MYSQLI_OPT_WRITE_TIMEOUT, 60);

// Connect with increased timeouts for handling large data
$mysqli_large_data->real_connect('localhost', 'username', 'password', 'database');

if ($mysqli_large_data->connect_errno) {
    die("Failed to connect with custom timeouts: " . $mysqli_large_data->connect_error);
}

// Example 5: Persistent connection setup

$mysqli_persistent = new mysqli();

// Use mysqli_options to set MYSQLI_INIT_COMMAND before persistent connection
mysqli_options($mysqli_persistent, MYSQLI_INIT_COMMAND, "SET SESSION wait_timeout=28800");

// Enable persistent connection by prefixing 'p:' to the host
$mysqli_persistent->real_connect('p:localhost', 'username', 'password', 'database');

if ($mysqli_persistent->connect_errno) {
    die("Failed to establish a persistent connection: " . $mysqli_persistent->connect_error);
}