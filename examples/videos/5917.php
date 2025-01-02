<?php
// Database connection setup
$host = 'localhost';
$user = 'root';
$password = 'password';
$database = 'test_db';

// Establish a connection
$mysqli = new mysqli($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare an SQL statement
$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");

// Check if the statement was prepared successfully
if (!$stmt) {
    die("Preparation failed: " . $mysqli->error);
}

// Bind parameters (s - string, i - integer, d - double)
$username = 'john_doe';
$email = 'john@example.com';
$stmt->bind_param("ss", $username, $email);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$mysqli->close();
?>