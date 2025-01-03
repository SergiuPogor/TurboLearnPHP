<?php

// Example: Using mysqli_real_escape_string() to secure SQL queries

// Database connection details
$host = 'localhost';
$username = 'root';
$password = 'password';
$database = 'my_database';

// Create a connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sample user input
$userInput = "O'Reilly";

// Escape the user input to prevent SQL injection
$safeInput = $mysqli->real_escape_string($userInput);

// Prepare the SQL query
$query = "SELECT * FROM users WHERE last_name = '$safeInput'";

// Execute the query
if ($result = $mysqli->query($query)) {
    // Fetch the results
    while ($row = $result->fetch_assoc()) {
        echo "User: " . $row['first_name'] . " " . $row['last_name'] . "\n";
    }
    // Free result set
    $result->free();
} else {
    echo "Error executing query: " . $mysqli->error;
}

// Close the connection
$mysqli->close();

?>