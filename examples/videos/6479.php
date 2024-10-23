<?php

// Database connection
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Example SQL query
$sql = "SELECT * FROM non_existent_table";

// Execute query
if (!$result = $mysqli->query($sql)) {
    // Fetch SQLSTATE error code
    $sqlstate = $mysqli->sqlstate;
    echo "SQLSTATE error code: " . $sqlstate . "\n";
    
    // Handle specific error cases based on SQLSTATE
    switch ($sqlstate) {
        case '42S02':
            echo "Error: Table does not exist.\n";
            break;
        case '42000':
            echo "Error: Syntax error in SQL query.\n";
            break;
        default:
            echo "Error: An unexpected error occurred.\n";
    }
} else {
    // Process results
    while ($row = $result->fetch_assoc()) {
        echo "Data: " . $row['column_name'] . "\n";
    }
}

// Close connection
$mysqli->close();

?>