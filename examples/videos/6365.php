<?php

// Establishing a MySQLi connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check for a connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a statement
$stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE active = ?");

// Set the parameter
$active = 1;
$stmt->bind_param("i", $active);

// Execute the statement
$stmt->execute();

// Get the result metadata
$resultMetadata = $stmt->result_metadata();

// Fetch field information
$fields = [];
while ($field = $resultMetadata->fetch_field()) {
    $fields[] = $field->name;
}

// Bind the result variables dynamically
$bindParams = [];
$results = [];
foreach ($fields as $key => $field) {
    $bindParams[$key] = null;
    $results[$key] = &$bindParams[$key]; // Reference variable
}

// Store the result into the bound variables
$stmt->store_result();
call_user_func_array([$stmt, 'bind_result'], $results);

// Fetch the data
while ($stmt->fetch()) {
    // Create an associative array for the result
    $userData = array_combine($fields, $bindParams);
    
    // Print the result (you can store it or process it as needed)
    echo "User ID: " . $userData['id'] . ", Name: " . $userData['name'] . ", Email: " . $userData['email'] . "\n";
}

// Clean up
$stmt->close();
$mysqli->close();
?>