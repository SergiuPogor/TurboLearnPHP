<?php

// Example: Using mysqli_stmt_execute() for dynamic SQL queries

// Database connection details
$host = "localhost";         // Database host
$user = "root";              // Database user
$password = "password";      // Database password
$dbname = "test_db";         // Database name

// Create a new mysqli connection
$mysqli = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare the SQL statement
$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");

// Check if preparation was successful
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($mysqli->error));
}

// Bind parameters to the prepared statement
$username = "newuser";
$email = "newuser@example.com";
$stmt->bind_param("ss", $username, $email); // 'ss' indicates two string parameters

// Execute the prepared statement
if ($stmt->execute()) {
    echo "New user created successfully.\n";
} else {
    echo "Error executing statement: " . htmlspecialchars($stmt->error) . "\n";
}

// Prepare another statement with different parameters
$stmt = $mysqli->prepare("UPDATE users SET email = ? WHERE username = ?");
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($mysqli->error));
}

// Bind parameters for the update
$newEmail = "updateduser@example.com";
$username = "newuser";
$stmt->bind_param("ss", $newEmail, $username);

// Execute the update
if ($stmt->execute()) {
    echo "User email updated successfully.\n";
} else {
    echo "Error executing update: " . htmlspecialchars($stmt->error) . "\n";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

?>