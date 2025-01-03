<?php

// Step 1: Establish a connection to the MySQL database
$host = "localhost";
$username = "my_user";
$password = "my_password";
$dbname = "my_database";

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Prepare an SQL statement for updating records
$stmt = $mysqli->prepare("UPDATE my_table SET column_name = ? WHERE id = ?");

// Check if preparation was successful
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

// Example values to update
$newValue = "Updated Value";
$idToUpdate = 1;

// Step 3: Bind parameters to the SQL query
$stmt->bind_param("si", $newValue, $idToUpdate);

// Step 4: Execute the statement
$stmt->execute();

// Step 5: Get the number of affected rows
$affectedRows = $stmt->affected_rows;
echo "Number of affected rows: " . $affectedRows . "\n";

// Step 6: Check if the update was successful
if ($affectedRows > 0) {
    echo "Record updated successfully.\n";
} else {
    echo "No records were updated. Check the ID or values.\n";
}

// Step 7: Close the statement and connection
$stmt->close();
$mysqli->close();

?>