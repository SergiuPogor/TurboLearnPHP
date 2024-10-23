<?php

// Example: Using mysqli_release_savepoint() to manage transactions with savepoints

// Database connection details
$host = 'localhost';
$username = 'user';
$password = 'password';
$database = 'test_db';

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Start a transaction
$mysqli->begin_transaction();

try {
    // Create a savepoint
    $mysqli->query("SAVEPOINT savepoint1");
    
    // First query: Insert data into table
    $mysqli->query("INSERT INTO users (name, email) VALUES ('Alice', 'alice@example.com')");
    
    // Create another savepoint
    $mysqli->query("SAVEPOINT savepoint2");
    
    // Second query: Insert data into another table
    $mysqli->query("INSERT INTO orders (user_id, total) VALUES (LAST_INSERT_ID(), 100)");
    
    // Intentionally cause an error to demonstrate rollback
    $mysqli->query("INSERT INTO non_existing_table (column) VALUES ('value')"); // This will fail
    
    // If we reach this point, commit the transaction
    $mysqli->commit();
} catch (Exception $e) {
    // An error occurred; release the second savepoint
    $mysqli->query("ROLLBACK TO savepoint2");
    echo "Rolled back to savepoint2 due to: " . $e->getMessage() . "\n";
    
    // Optionally release the first savepoint
    $mysqli->query("RELEASE SAVEPOINT savepoint1");
    
    // Now handle the error and decide what to do next
    // E.g., you can rollback entirely or commit partial changes
}

// Finally, close the connection
$mysqli->close();

?>