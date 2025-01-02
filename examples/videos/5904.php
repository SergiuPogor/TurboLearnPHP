<?php
// Database connection parameters
$host = 'localhost';
$user = 'username';
$pass = 'password';
$dbname = 'example_db';

// Establishing the database connection
$mysqli = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Disable autocommit to manage transactions manually
$mysqli->autocommit(FALSE);

// Start a transaction
try {
    // Example query 1: Insert a new record
    $sql1 = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";
    if (!$mysqli->query($sql1)) {
        throw new Exception("Insert failed: " . $mysqli->error);
    }

    // Example query 2: Update an existing record
    $sql2 = "UPDATE users SET email = 'john.doe@example.com' WHERE name = 'John Doe'";
    if (!$mysqli->query($sql2)) {
        throw new Exception("Update failed: " . $mysqli->error);
    }

    // Commit the transaction if both queries succeeded
    $mysqli->commit();
    echo "Transaction completed successfully!\n";
} catch (Exception $e) {
    // Rollback the transaction in case of an error
    $mysqli->rollback();
    echo "Transaction rolled back: " . $e->getMessage() . "\n";
}

// Re-enable autocommit for future transactions
$mysqli->autocommit(TRUE);

// Closing the database connection
$mysqli->close();
?>