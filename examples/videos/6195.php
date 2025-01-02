<?php

// Example: Using mysqli_stmt_num_rows() to count rows from a prepared statement

// Step 1: Create a connection to the database
$mysqli = new mysqli("localhost", "user", "password", "database");

// Step 2: Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 3: Prepare a SQL statement
$sql = "SELECT * FROM users WHERE status = ?";
$stmt = $mysqli->prepare($sql);

// Step 4: Bind parameters
$status = 'active';
$stmt->bind_param("s", $status);

// Step 5: Execute the statement
$stmt->execute();

// Step 6: Store result to access the number of rows
$stmt->store_result();

// Step 7: Get the number of rows
$rowCount = $stmt->num_rows;

// Step 8: Output the number of rows
echo "Number of active users: " . $rowCount . "\n";

// Step 9: Fetch the results if needed
$stmt->bind_result($id, $name, $email, $status);
while ($stmt->fetch()) {
    echo "User ID: $id, Name: $name, Email: $email\n";
}

// Step 10: Close the statement and connection
$stmt->close();
$mysqli->close();

?>