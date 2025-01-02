<?php

// Example PHP script demonstrating the use of mysqli_stmt_get_result() 
// for fetching results from a prepared statement in MySQL.

$host = 'localhost';
$user = 'testuser';
$password = 'secret';
$dbname = 'testdb';

// Create a MySQLi connection
$connection = new mysqli($host, $user, $password, $dbname);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare a SQL statement
$stmt = $connection->prepare("SELECT id, name FROM users WHERE age > ?");
$stmt->bind_param("i", $age);

// Set the parameter value
$age = 18;

// Execute the prepared statement
$stmt->execute();

// Fetch the result set
$result = $stmt->get_result();

// Check if there are results and process them
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "User ID: " . $row['id'] . ", Name: " . $row['name'] . "<br>";
    }
} else {
    echo "No users found.";
}

// Close the statement
$stmt->close();

// Close the database connection
$connection->close();
?>