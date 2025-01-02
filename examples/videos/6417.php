<?php

// Database configuration
$host = 'localhost';
$username = 'root';
$password = 'password';
$database = 'my_database';

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

// Prepare a statement with multiple queries
$stmt = $mysqli->prepare("CALL my_stored_procedure();");

// Execute the statement
$stmt->execute();

// Handle multiple result sets
do {
    // Store the result set for the current query
    $stmt->store_result();
    
    // Check if the result set has rows
    if ($stmt->num_rows > 0) {
        // Fetch all results
        $result = $stmt->get_result();
        
        // Process each row
        while ($row = $result->fetch_assoc()) {
            // Display the fetched row
            echo "Row: " . json_encode($row) . "\n";
        }
    }
} while ($stmt->next_result()); // Move to the next result set

// Close the statement
$stmt->close();

// Close the database connection
$mysqli->close();
echo "Database connection closed.\n";

?>