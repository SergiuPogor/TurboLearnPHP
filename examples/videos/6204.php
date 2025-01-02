<?php

// Example: Using mysqli_savepoint() for transaction control

// Step 1: Create a new MySQLi connection
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Start the transaction
$mysqli->begin_transaction();

try {
    // Step 3: Create a savepoint
    $mysqli->query("SAVEPOINT my_savepoint");

    // Step 4: Perform some database operations
    $mysqli->query("INSERT INTO users (username, email) VALUES ('john_doe', 'john@example.com')");
    $mysqli->query("INSERT INTO orders (user_id, amount) VALUES (LAST_INSERT_ID(), 100)");

    // Step 5: Simulate an error in the next operation
    if ($mysqli->query("INSERT INTO orders (user_id, amount) VALUES (999999, 200)") === FALSE) {
        // Roll back to the savepoint
        $mysqli->query("ROLLBACK TO my_savepoint");
        echo "Transaction rolled back to the savepoint due to error: " . $mysqli->error;
    }

    // Step 6: Release the savepoint after successful operations
    $mysqli->query("RELEASE SAVEPOINT my_savepoint");

    // Step 7: Commit the transaction
    $mysqli->commit();
    echo "Transaction committed successfully!";
} catch (Exception $e) {
    // Rollback if any error occurs
    $mysqli->rollback();
    echo "Transaction rolled back due to error: " . $e->getMessage();
}

// Step 8: Close the MySQLi connection
$mysqli->close();

?>