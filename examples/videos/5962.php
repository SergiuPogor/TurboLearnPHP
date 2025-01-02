<?php

// Example demonstrating mysqli_get_proto_info() function

// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = 'password';
$database = 'test_db';

// Create a new mysqli instance
$mysqli = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Retrieve MySQL protocol version
$protocolVersion = $mysqli->get_proto_info();

// Output the protocol version
echo "MySQL Protocol Version: {$protocolVersion}\n";

// Use the protocol version for conditional logic
if ($protocolVersion >= 10) {
    echo "You are using a modern version of MySQL.\n";
} else {
    echo "Consider upgrading your MySQL server for better features.\n";
}

// Execute a sample query
$query = "SELECT * FROM sample_table";
$result = $mysqli->query($query);

// Check for errors in the query execution
if (!$result) {
    echo "Query Error: " . $mysqli->error . "\n";
} else {
    // Process the result set
    while ($row = $result->fetch_assoc()) {
        echo "Row: " . implode(", ", $row) . "\n";
    }
}

// Close the connection
$mysqli->close();
?>