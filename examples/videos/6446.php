<?php

// Function to check if the MySQL connection is alive
function checkConnection(mysqli $mysqli): bool {
    // Use mysqli_ping to check connection status
    if ($mysqli->ping()) {
        return true; // Connection is alive
    } else {
        // Attempt to reconnect if the connection is lost
        if ($mysqli->connect_errno) {
            return false; // Connection failed
        }
        return true; // Reconnection successful
    }
}

// Example usage of the connection check
function exampleDatabaseConnection() {
    // Database connection parameters
    $host = 'localhost';
    $user = 'your_username';
    $password = 'your_password';
    $database = 'your_database';

    // Create a new MySQLi connection
    $mysqli = new mysqli($host, $user, $password, $database);

    // Check for connection errors
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Check if the connection is alive
    if (checkConnection($mysqli)) {
        echo "Database connection is active." . PHP_EOL;

        // Perform database operations here...
    } else {
        echo "Database connection is lost. Attempting to reconnect..." . PHP_EOL;

        // Here you might want to handle the reconnection logic or exit
    }

    // Close the connection
    $mysqli->close();
}

// Run the example
exampleDatabaseConnection();