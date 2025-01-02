<?php

// Database connection parameters
$host = 'localhost';
$dbname = 'testdb';
$user = 'yourusername';
$password = 'yourpassword';

// Create a new mysqli connection
$mysqli = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Start transaction
$mysqli->begin_transaction();

try {
    // Sample queries
    $sql1 = "INSERT INTO users (username, email) VALUES ('john_doe', 'john@example.com')";
    $sql2 = "INSERT INTO profiles (user_id, bio) VALUES (LAST_INSERT_ID(), 'Hello, I am John!')";

    // Execute first query
    if (!$mysqli->query($sql1)) {
        throw new Exception("First query failed: " . $mysqli->error);
    }

    // Execute second query
    if (!$mysqli->query($sql2)) {
        throw new Exception("Second query failed: " . $mysqli->error);
    }

    // Commit the transaction
    $mysqli->commit();
    echo "Transaction completed successfully.";
} catch (Exception $e) {
    // Rollback the transaction on error
    $mysqli->rollback();
    echo "Transaction rolled back: " . $e->getMessage();
}

// Close the connection
$mysqli->close();
?>