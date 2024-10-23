<?php

// Example: Using mysqli_multi_query() for batch operations in PHP

// Step 1: Database connection setup
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Define multiple SQL statements
$sql = "
    INSERT INTO users (username, email) VALUES ('john_doe', 'john@example.com');
    INSERT INTO users (username, email) VALUES ('jane_smith', 'jane@example.com');
    UPDATE users SET email = 'john_new@example.com' WHERE username = 'john_doe';
    DELETE FROM users WHERE username = 'jane_smith';
";

// Step 3: Execute the multi-query
if ($mysqli->multi_query($sql)) {
    do {
        // Store the result set for the first query
        if ($result = $mysqli->store_result()) {
            // Process results if needed
            while ($row = $result->fetch_assoc()) {
                // echo "User: " . $row['username'];
            }
            $result->free();
        }
        // Prepare for the next result set
    } while ($mysqli->more_results() && $mysqli->next_result());
} else {
    echo "Error executing multi-query: " . $mysqli->error;
}

// Step 4: Closing the connection
$mysqli->close();

// ----
// Advanced Example: Using mysqli_multi_query() with dynamic data

// Imagine you want to insert data from an array of users
$users = [
    ['username' => 'alice_wonder', 'email' => 'alice@example.com'],
    ['username' => 'bob_builder', 'email' => 'bob@example.com'],
];

// Step 5: Create dynamic SQL for batch insert
$insertSQL = "INSERT INTO users (username, email) VALUES ";
$values = [];
foreach ($users as $user) {
    $values[] = "('" . $mysqli->real_escape_string($user['username']) . "', '" . 
                 $mysqli->real_escape_string($user['email']) . "')";
}

// Combine values into the final SQL statement
$insertSQL .= implode(', ', $values) . ';';

// Execute the insert operation
if ($mysqli->multi_query($insertSQL)) {
    do {
        if ($result = $mysqli->store_result()) {
            // Process results if needed
            $result->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
} else {
    echo "Error executing multi-query: " . $mysqli->error;
}

// Step 6: Additional SQL commands can be executed in a similar way
// ...

// Closing the connection again
$mysqli->close();
?>