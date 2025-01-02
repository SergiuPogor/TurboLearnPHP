<?php

// Database connection
$mysqli = new mysqli("localhost", "user", "password", "test_db");

// Check if connection failed
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a statement - intentionally using an incorrect query for demonstration
$stmt = $mysqli->prepare("SELECT col1, col2 FROM non_existing_table WHERE id = ?");
if (!$stmt) {
    echo "Statement preparation failed: " . $mysqli->error . PHP_EOL;
} else {
    // Bind parameters
    $stmt->bind_param("i", $id);
    $id = 10;

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Statement execution failed: " . $stmt->error . PHP_EOL;

        // Example 1: Use mysqli_stmt_error to log errors in complex scenarios
        $logError = "Error encountered: " . $stmt->error;
        file_put_contents('/tmp/test/error_log.txt', $logError . PHP_EOL, FILE_APPEND);
        
        // Example 2: Capture error and act based on different error types
        if (strpos($stmt->error, 'non_existing_table') !== false) {
            echo "Specific error: Table doesn't exist. Please check table name." . PHP_EOL;
        } else {
            echo "An unknown error occurred. Check your query." . PHP_EOL;
        }
    }

    // Example 3: Retrying after an error
    if ($stmt->error) {
        echo "Retrying with a modified query..." . PHP_EOL;

        // Retry with a valid table name
        $stmt = $mysqli->prepare("SELECT col1, col2 FROM valid_table WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();

            // Check for errors again
            if ($stmt->error) {
                echo "Failed again: " . $stmt->error . PHP_EOL;
            } else {
                echo "Query successful on retry." . PHP_EOL;
            }
        }
    }
}

// Always close the statement
$stmt->close();

// Close the database connection
$mysqli->close();