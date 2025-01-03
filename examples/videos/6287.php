<?php

// Example: Using mysqli_connect_errno for error handling in MySQL connections

// Database connection parameters
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database_name';

// Attempt to connect to the MySQL database
$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connection) {
    // Fetch and handle the connection error
    $errorCode = mysqli_connect_errno();
    $errorMessage = mysqli_connect_error();
    
    // Log the error code and message
    error_log("MySQL Connection Error: Code $errorCode - $errorMessage");
    
    // Handle specific error codes
    switch ($errorCode) {
        case 1045: // Access denied
            echo "Access denied. Check your username and password.";
            break;
        case 2002: // Connection refused
            echo "Unable to connect to MySQL server. Check server status.";
            break;
        default:
            echo "An error occurred. Code: $errorCode. Message: $errorMessage";
            break;
    }
    exit(); // Stop further execution
}

// Connection was successful
echo "Connected to MySQL successfully!";

// Additional database operations can be performed here

// Close the connection
mysqli_close($connection);

?>