<?php

// Using mysqli_stmt_bind_result() to securely fetch data from a database.
// This example shows how to bind result variables to your query results.

$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection.
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare the SQL statement.
$stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE active = ?");

// Bind parameters to the prepared statement.
$activeStatus = 1; // Active users only
$stmt->bind_param("i", $activeStatus);

// Execute the prepared statement.
$stmt->execute();

// Bind result variables.
$stmt->bind_result($id, $name, $email);

// Fetch values and display them.
while ($stmt->fetch()) {
    echo "ID: $id, Name: $name, Email: $email" . PHP_EOL;
}

// Close the statement and connection.
$stmt->close();
$mysqli->close();

// Example function to fetch user details with error handling.
function getUserDetails($userId) {
    global $mysqli; // Use the global mysqli connection

    // Prepare the SQL statement.
    $stmt = $mysqli->prepare("SELECT name, email FROM users WHERE id = ?");
    
    // Check for errors.
    if ($stmt === false) {
        die("Prepare failed: " . $mysqli->error);
    }

    // Bind parameters.
    $stmt->bind_param("i", $userId);
    
    // Execute and bind results.
    $stmt->execute();
    $stmt->bind_result($name, $email);
    
    // Fetch and return user details.
    if ($stmt->fetch()) {
        return [
            "name" => $name,
            "email" => $email
        ];
    } else {
        return null; // User not found
    }
}

// Example usage of getUserDetails function.
$userId = 2; // Example user ID
$userDetails = getUserDetails($userId);
if ($userDetails) {
    echo "Name: {$userDetails['name']}, Email: {$userDetails['email']}" . PHP_EOL;
} else {
    echo "User not found." . PHP_EOL;
}

?>