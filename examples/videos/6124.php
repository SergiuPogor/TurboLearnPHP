<?php
// Establish a connection to the MySQL database
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check for a connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve client information using mysqli_get_client_info
$clientInfo = mysqli_get_client_info();

// Display the MySQL client version information
echo "MySQL Client Information: " . $clientInfo . "\n";

// Optionally, display server version for comparison
$serverInfo = $mysqli->server_info;
echo "MySQL Server Version: " . $serverInfo . "\n";

// Debugging: Check if client version is compatible with server version
if (version_compare($clientInfo, $serverInfo, '<')) {
    echo "Warning: Your client version is lower than the server version.\n";
}

// Close the MySQL connection
$mysqli->close();

// Example of checking and logging client info in a real application
function logClientInfo($mysqli) {
    $clientInfo = mysqli_get_client_info();
    // Here we would log this information to a file or monitoring system
    error_log("Client Info: " . $clientInfo);
}

// Call the logging function
logClientInfo($mysqli);