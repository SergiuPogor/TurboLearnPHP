<?php

// Connect to MySQL database
$host = 'localhost';
$dbname = 'testdb';
$user = 'yourusername';
$password = 'yourpassword';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a sample query
$query = "SELECT id, name, email FROM users";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch all results
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "\n";
    }

    // Free the result set to optimize memory usage
    $result->free();
} else {
    echo "Error: " . $conn->error . "\n";
}

// Another query example
$anotherQuery = "SELECT COUNT(*) as total FROM users";
$totalResult = $conn->query($anotherQuery);

if ($totalResult) {
    $row = $totalResult->fetch_assoc();
    echo "Total Users: " . $row['total'] . "\n";
    $totalResult->free(); // Free memory for the total result
} else {
    echo "Error: " . $conn->error . "\n";
}

// Close the connection
$conn->close();
?>