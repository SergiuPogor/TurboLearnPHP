<?php

// Database connection details
$host = 'localhost';
$user = 'yourusername';
$password = 'yourpassword';
$database = 'testdb';

// Connect to MySQL database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Begin transaction
$conn->begin_transaction();

try {
    // Sample queries to update data
    $conn->query("UPDATE users SET balance = balance - 100 WHERE id = 1");
    $conn->query("UPDATE users SET balance = balance + 100 WHERE id = 2");

    // Commit the transaction
    $conn->commit();
    echo "Transaction committed successfully.\n";
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo "Transaction rolled back: " . $e->getMessage() . "\n";
}

// Close the database connection
$conn->close();
?>