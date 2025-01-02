<?php

// Example demonstrating the use of mysqli_stmt_attr_set() 
// for optimizing prepared statements in PHP MySQLi.
// This will showcase adjusting statement attributes for better performance.

$mysqli = new mysqli("localhost", "username", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a statement for executing a query.
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
if ($stmt === false) {
    die("Prepare failed: " . $mysqli->error);
}

// Set the attribute for the prepared statement to use buffered queries.
$stmt->attr_set(MYSQLI_STMT_ATTR_BUFFERED, true);

// Now bind parameters and execute the statement.
$email = "example@example.com";
$stmt->bind_param("s", $email);

// Execute the statement.
$stmt->execute();

// Store the result to fetch data later.
$stmt->store_result();

// Check how many rows were found.
$num_rows = $stmt->num_rows;
echo "Number of users found: $num_rows" . PHP_EOL;

// Fetch the results.
$stmt->bind_result($id, $name, $email);
while ($stmt->fetch()) {
    echo "ID: $id, Name: $name, Email: $email" . PHP_EOL;
}

// Close the statement and connection.
$stmt->close();
$mysqli->close();

// Another example demonstrating the use of attributes to prevent 
// data conversion issues in large datasets.

$largeDataStmt = $mysqli->prepare("SELECT large_column FROM big_table WHERE id = ?");
$largeDataStmt->attr_set(MYSQLI_STMT_ATTR_USE_RESULT, true);

$id = 1;
$largeDataStmt->bind_param("i", $id);
$largeDataStmt->execute();

$largeDataStmt->bind_result($largeData);
while ($largeDataStmt->fetch()) {
    // Process large data efficiently.
    echo "Data: $largeData" . PHP_EOL;
}

$largeDataStmt->close();
$mysqli->close();

?>