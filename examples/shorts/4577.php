<?php

// Example demonstrating advanced PHP exception handling

// Custom exception class
class DatabaseException extends Exception {
    // Additional properties or methods can be added here
}

// Function that simulates a database operation
function performDatabaseOperation($operation) {
    // Simulating an error condition
    if ($operation === 'insert') {
        throw new DatabaseException("Failed to insert data into database.");
    } elseif ($operation === 'update') {
        throw new DatabaseException("Failed to update data in database.");
    }
    // Successful operation
    return true;
}

// Example usage with try-catch block
try {
    // Attempting to perform database insert
    performDatabaseOperation('insert');
    echo "Database operation successful.\n";
} catch (DatabaseException $e) {
    // Handling specific database exceptions
    echo "Database operation failed: " . $e->getMessage() . "\n";
}

?>