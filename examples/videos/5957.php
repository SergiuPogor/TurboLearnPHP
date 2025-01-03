<?php

// Database connection
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare an SQL statement
$stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

// Sample data for insertion
$name = "John Doe";
$email = "john@example.com";

// Execute the statement
if ($stmt->execute()) {
    // Get the last inserted ID
    $lastId = $mysqli->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $lastId;

    // Example: Using last inserted ID to insert into another table
    $stmt2 = $mysqli->prepare("INSERT INTO user_profiles (user_id, bio) VALUES (?, ?)");
    $bio = "This is the bio of user " . $name;
    $stmt2->bind_param("is", $lastId, $bio);
    if ($stmt2->execute()) {
        echo "User profile created successfully for user ID: " . $lastId;
    } else {
        echo "Error creating user profile: " . $stmt2->error;
    }
    $stmt2->close();
} else {
    echo "Error: " . $stmt->error;
}

// Close statements and connection
$stmt->close();
$mysqli->close();
?>