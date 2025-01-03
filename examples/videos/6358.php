<?php

// Function to check MySQL server version
function checkMySQLVersion($connection) {
    // Check if the connection is valid
    if ($connection) {
        // Get the server version
        $version = mysqli_get_server_version($connection);
        // Return the version number
        return $version;
    }
    return null; // Return null if connection is invalid
}

// Function to create a database connection
function createDatabaseConnection() {
    // Database connection parameters
    $host = 'localhost';
    $user = 'username'; // Replace with your database username
    $password = 'password'; // Replace with your database password
    $database = 'database_name'; // Replace with your database name
    
    // Create a new connection
    $connection = mysqli_connect($host, $user, $password, $database);
    
    // Check connection
    if (!$connection) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    
    return $connection;
}

// Main execution
$connection = createDatabaseConnection();
$serverVersion = checkMySQLVersion($connection);

if ($serverVersion) {
    echo "Connected to MySQL Server version: $serverVersion\n";
    // Perform version-specific logic here
    // Example: Optimizing queries based on version
    if ($serverVersion >= 80000) { // Example for MySQL 8.0 and above
        echo "You can use window functions for optimized queries.\n";
    } else {
        echo "Consider upgrading to utilize new features.\n";
    }
} else {
    echo "Failed to retrieve server version.\n";
}

// Close the connection
mysqli_close($connection);