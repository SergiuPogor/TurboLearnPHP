<?php

// Connect to the MySQL database
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to execute multiple queries
function executeQueries($mysqli, $queries) {
    foreach ($queries as $query) {
        if ($mysqli->query($query) === TRUE) {
            // If the query was successful, check the number of fields
            $fieldCount = $mysqli->field_count;
            echo "Query executed successfully. Field count: $fieldCount\n";
        } else {
            echo "Error executing query: " . $mysqli->error . "\n";
        }
    }
}

// Array of SQL queries
$queries = [
    "SELECT id, name FROM users",
    "SELECT id, title, content FROM posts",
    "INSERT INTO logs (action) VALUES ('Query executed')"
];

// Execute the queries
executeQueries($mysqli, $queries);

// Get the total field count after executing the last query
$totalFields = $mysqli->field_count;
echo "Total fields from the last query: $totalFields\n";

// Close the connection
$mysqli->close();
?>