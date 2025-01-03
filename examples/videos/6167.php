<?php

// Database connection
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Set up asynchronous queries
$mysqli->query("SELECT * FROM users", MYSQLI_ASYNC);
$mysqli->query("SELECT * FROM orders", MYSQLI_ASYNC);

// Store the result sets
$results = [];

// Loop until all queries are complete
do {
    // Check for any completed queries
    $links = [$mysqli];
    $errors = [];
    $reject = [];
    $active = $links;
    
    // Wait for any query to complete
    $result = mysqli_poll($active, $errors, $reject, 1);

    // If there is an error, break the loop
    if ($result === false) {
        break;
    }

    // Loop through each active connection
    foreach ($active as $link) {
        // Reap any completed query results
        if ($link === $mysqli) {
            while ($res = $mysqli->reap_async_query()) {
                if ($res instanceof mysqli_result) {
                    $results[] = $res->fetch_all(MYSQLI_ASSOC);
                    $res->free();
                }
            }
        }
    }
} while (!empty($active));

// Close the database connection
$mysqli->close();

// Display results
foreach ($results as $index => $resultSet) {
    echo "Result Set " . ($index + 1) . ":\n";
    print_r($resultSet);
}

?>