<?php

// Database connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL statement
$sql = "INSERT INTO users (name, email) VALUES (?, ?)";

// Prepare the statement
$stmt = $mysqli->stmt_init();

if ($stmt->prepare($sql)) {
    // Bind parameters (s = string, i = integer, d = double, b = blob)
    $name = "John Doe";
    $email = "john.doe@example.com";
    
    $stmt->bind_param("ss", $name, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully.\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}

// Close connection
$mysqli->close();
?>