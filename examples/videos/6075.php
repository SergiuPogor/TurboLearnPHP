<?php

// Function to demonstrate the usage of mysqli_use_result
function fetchResultsWithStreaming(mysqli $connection, string $query) {
    // Execute the query
    if (!$result = $connection->query($query)) {
        die("Query Error: " . $connection->error);
    }

    // Use mysqli_use_result to stream results
    $streamedResult = $connection->use_result();

    // Check if the result is valid
    if ($streamedResult) {
        // Fetch all rows
        while ($row = $streamedResult->fetch_assoc()) {
            // Process each row (for demonstration, just print it)
            print_r($row);
        }
        // Free the result set
        $streamedResult->free();
    } else {
        echo "No results found.\n";
    }
}

// Example usage with a sample MySQL connection
$host = 'localhost';
$username = 'user';
$password = 'password';
$database = 'example_db';

// Create a new mysqli connection
$connection = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Define a query that returns a large dataset
$query = "SELECT * FROM large_table LIMIT 1000";

// Call the function to fetch and process results
fetchResultsWithStreaming($connection, $query);

// Close the database connection
$connection->close();

?>