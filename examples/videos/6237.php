<?php

// Connection settings
$host = 'localhost';
$user = 'root';
$pass = 'password';
$db = 'my_database';

// Connect to MySQL
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Example query that may fail
$query = "SELECT * FROM non_existent_table";
$result = $mysqli->query($query);

// Check for errors using mysqli_errno
if (!$result) {
    $error_code = $mysqli->errno;

    // Handle different MySQL error cases
    switch ($error_code) {
        case 1146: // Table doesn't exist
            echo "Error: The table you're trying to query does not exist!";
            break;
        case 1049: // Database doesn't exist
            echo "Error: The database you're trying to access doesn't exist!";
            break;
        case 1064: // SQL syntax error
            echo "Error: There's an issue with your SQL syntax!";
            break;
        default:
            echo "MySQL Error Code: $error_code";
    }

    // Log error for later review
    error_log("MySQL Error $error_code on query: $query", 3, '/tmp/test/mysql_errors.log');
} else {
    // Example: Fetch and display results if no errors
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
}

// Multiple way to handle similar cases with error handling
// First: Retry the query with error handling if mysqli_errno detects a recoverable error
if ($mysqli->errno === 1062) {  // Example for duplicate entry error
    echo "Duplicate entry detected, attempting to update instead!";
    
    // Retry the operation with a different approach (e.g., update instead of insert)
    $retry_query = "UPDATE existing_table SET column1 = 'value' WHERE id = 1";
    if ($mysqli->query($retry_query)) {
        echo "Retry successful!";
    } else {
        echo "Retry failed! Error: " . $mysqli->errno;
    }
}

// Second: Fallback scenario for more critical errors - stopping execution
if ($mysqli->errno === 2006) { // MySQL server has gone away
    die("Critical error: MySQL server went away. Please check server settings.");
}

// Cleanup and close the connection
$mysqli->close();