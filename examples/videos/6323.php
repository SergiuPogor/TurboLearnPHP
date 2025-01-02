<?php

// Example: Using mysqli_poll() for asynchronous MySQL queries

// Database connection details
$host = 'localhost';
$user = 'your_username';
$password = 'your_password';
$database = 'your_database';

// Create an array to hold MySQLi connections
$connections = [];
$results = [];

// Create multiple connections to the database
for ($i = 0; $i < 5; $i++) {
    $conn = new mysqli($host, $user, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Store the connection
    $connections[] = $conn;

    // Prepare a query
    $query = "SELECT * FROM your_table LIMIT 10 OFFSET " . ($i * 10);
    
    // Execute the query
    if (!$conn->query($query)) {
        echo "Error executing query: " . $conn->error . PHP_EOL;
    } else {
        // Store the result object
        $results[] = $conn->store_result();
    }
}

// Polling the connections for results
$read = $connections;
$write = null;
$except = null;

// Use mysqli_poll to check the status of each connection
while (!empty($read)) {
    // Poll the connections
    $changedConnections = $read;
    $ready = mysqli_poll($changedConnections, $write, $except, 1);
    
    // Check for results
    foreach ($changedConnections as $key => $conn) {
        if ($ready) {
            // Fetch results if available
            if ($conn->more_results()) {
                do {
                    // Store the results
                    $result = $conn->store_result();
                    if ($result) {
                        echo "Results from connection " . ($key + 1) . ":" . PHP_EOL;
                        while ($row = $result->fetch_assoc()) {
                            print_r($row);
                        }
                        $result->free();
                    }
                } while ($conn->next_result());
            }
            // Remove the connection from the list
            unset($read[$key]);
        }
    }
}

// Close all connections
foreach ($connections as $conn) {
    $conn->close();
}

?>