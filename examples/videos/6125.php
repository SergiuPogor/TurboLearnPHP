<?php
// Connect to MySQL database
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check for connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a SQL statement
$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");

// Check if statement preparation was successful
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

// Bind parameters
$username = "john_doe";
$email = "john@example.com";
$stmt->bind_param("ss", $username, $email);

// Execute the statement
$stmt->execute();

// Check for errors using mysqli_stmt_errno
if ($stmt->errno) {
    // Log or display the specific error code
    echo "Error Code: " . $stmt->errno . " - " . $stmt->error . "\n";
} else {
    echo "New record created successfully.\n";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

// Example of handling errors in a function
function insertUser($mysqli, $username, $email) {
    $stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }
    
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    
    // Check for errors
    if ($stmt->errno) {
        error_log("Insert failed: Error Code: " . $stmt->errno . " - " . $stmt->error);
        return false; // Indicate failure
    }
    
    return true; // Indicate success
}

// Usage of the function
$inserted = insertUser($mysqli, "jane_doe", "jane@example.com");
if ($inserted) {
    echo "User inserted successfully.\n";
} else {
    echo "User insertion failed.\n";
}