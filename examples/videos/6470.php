<?php

// Step 1: Establish a database connection
$mysqli = new mysqli('localhost', 'username', 'password', 'test_db');

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Step 2: Perform a complex SQL query
// Example: Multi-row insert with ON DUPLICATE KEY UPDATE
$query = "INSERT INTO users (username, email) 
          VALUES ('john_doe', 'john@example.com'), ('jane_doe', 'jane@example.com')
          ON DUPLICATE KEY UPDATE email = VALUES(email)";

// Execute the query
$mysqli->query($query);

// Step 3: Get detailed information about the last query executed
$queryInfo = $mysqli->info;
echo "Query Info: " . $queryInfo . PHP_EOL;

// Step 4: Example of how you could log query details for debugging
$log = "Query executed: " . $query . PHP_EOL . "Query info: " . $queryInfo . PHP_EOL;
file_put_contents('/tmp/test/query_log.txt', $log);
echo "Query log saved." . PHP_EOL;

// Step 5: Show different data retrieved by `mysqli_info()` for other operations

// Example: Multi-row DELETE operation
$deleteQuery = "DELETE FROM users WHERE id IN (1, 2, 3)";
$mysqli->query($deleteQuery);

// Get info about the DELETE operation
$deleteInfo = $mysqli->info;
echo "DELETE Info: " . $deleteInfo . PHP_EOL;

// Step 6: Example of a multi-table UPDATE and use of `mysqli_info()`
$updateQuery = "UPDATE users u, orders o 
                SET u.status = 'active' 
                WHERE u.id = o.user_id AND o.order_status = 'paid'";
$mysqli->query($updateQuery);

// Get update info
$updateInfo = $mysqli->info;
echo "UPDATE Info: " . $updateInfo . PHP_EOL;

// Step 7: Error handling and logging
try {
    // Example: Running a faulty query
    $faultyQuery = "UPDATE non_existing_table SET column = 'value'";
    $mysqli->query($faultyQuery);
    
    if ($mysqli->error) {
        throw new Exception($mysqli->error);
    }
} catch (Exception $e) {
    echo "Caught an error: " . $e->getMessage() . PHP_EOL;
    file_put_contents('/tmp/test/error_log.txt', "Error: " . $e->getMessage() . PHP_EOL);
    echo "Error log saved." . PHP_EOL;
}

// Step 8: Demonstrating a safer approach using prepared statements with `mysqli_info()`
$preparedQuery = "INSERT INTO users (username, email) VALUES (?, ?) ON DUPLICATE KEY UPDATE email = VALUES(email)";
$stmt = $mysqli->prepare($preparedQuery);
$stmt->bind_param("ss", $username, $email);

// Insert first user
$username = 'alice';
$email = 'alice@example.com';
$stmt->execute();
echo "Insert 1 Info: " . $mysqli->info . PHP_EOL;

// Insert second user
$username = 'bob';
$email = 'bob@example.com';
$stmt->execute();
echo "Insert 2 Info: " . $mysqli->info . PHP_EOL;

// Close the statement and connection
$stmt->close();
$mysqli->close();