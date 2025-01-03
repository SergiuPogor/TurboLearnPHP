<?php

// Enable MySQLi debugging
mysqli_debug('d:t:query');

$host = 'localhost';
$username = 'my_user';
$password = 'my_password';
$dbname = 'my_database';

// Create a MySQLi connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Example: Invalid SQL to trigger debugging
$sqlQuery = "SELEC * FROM users"; // Typo in SQL command
$result = $connection->query($sqlQuery);

// Check if query was successful
if (!$result) {
    echo "Error: " . $connection->error . "\n"; // Show error
}

// Another example: A correct SQL query
$sqlInsert = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";
if ($connection->query($sqlInsert) === TRUE) {
    echo "New record created successfully.\n";
} else {
    echo "Error: " . $connection->error . "\n"; // Show error
}

// Close the connection
$connection->close();

?>