<?php

// Function to insert a new user and return the last inserted ID
function insertUser($mysqli, $name, $email) {
    // Prepare an SQL statement
    $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    
    // Bind parameters to the statement
    $stmt->bind_param("ss", $name, $email);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Retrieve the last inserted ID
        $lastId = $stmt->insert_id;
        
        // Close the statement
        $stmt->close();
        
        // Return the last inserted ID
        return $lastId;
    } else {
        // Handle error if the execution fails
        return "Error: " . $stmt->error;
    }
}

// Database connection
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert new user and get the last inserted ID
$name = "John Doe";
$email = "john.doe@example.com";
$lastInsertedId = insertUser($mysqli, $name, $email);

// Output the last inserted ID
echo "Last inserted user ID: " . $lastInsertedId;

// Close the database connection
$mysqli->close();

?>