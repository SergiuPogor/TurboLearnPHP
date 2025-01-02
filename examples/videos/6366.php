<?php

// Connect to MySQL database
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a SQL statement
$stmt = $mysqli->prepare("SELECT id, name, email, created_at FROM users WHERE active = ?");

// Bind parameters
$active = 1;
$stmt->bind_param("i", $active);

// Execute the statement
$stmt->execute();

// Get the field count
$fieldCount = $stmt->field_count;

// Print the number of fields
echo "Number of fields in result: " . $fieldCount . "\n";

// Fetch the result metadata
$result = $stmt->get_result();

// Loop through the result set
while ($row = $result->fetch_assoc()) {
    // Display the row data
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Email: " . $row['email'] . "\n";
}

// Clean up
$stmt->close();
$mysqli->close();
?>