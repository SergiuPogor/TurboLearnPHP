<?php
// Using mysqli_real_escape_string to secure user input

// Database connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// User input that needs to be sanitized
$userInput = "O'Reilly"; // Example input with special character

// Secure the input to prevent SQL injection
$safeInput = $mysqli->real_escape_string($userInput);

// Use the safe input in a SQL query
$query = "INSERT INTO users (name) VALUES ('$safeInput')";

// Execute the query
if ($mysqli->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}

// Close connection
$mysqli->close();