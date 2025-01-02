<?php

// Database connection
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a SQL statement
$sql = "INSERT INTO users (username, email, age) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Check if statement preparation was successful
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

// Bind parameters
$username = "JohnDoe";
$email = "johndoe@example.com";
$age = 30;

// Bind the variables to the statement as strings (s) and integer (i)
$stmt->bind_param("ssi", $username, $email, $age);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Clean up
$stmt->close();
$mysqli->close();
?>