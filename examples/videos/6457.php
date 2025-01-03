<?php

// Database connection parameters
$host = 'localhost';
$username = 'myuser';
$password = 'mypassword';
$dbname = 'mydb';

// Establish a connection to the MySQL database
$connection = mysqli_connect($host, $username, $password, $dbname);

// Check for connection errors
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get server information
$server_info = mysqli_get_server_info($connection);

// Display server information
echo "MySQL Server Version: " . $server_info . PHP_EOL;

// Use the server info for conditional logic
if (version_compare($server_info, '8.0.0', '>=')) {
    echo "You are using a recent version of MySQL." . PHP_EOL;
} else {
    echo "Consider upgrading your MySQL server." . PHP_EOL;
}

// Close the database connection
mysqli_close($connection);
?>