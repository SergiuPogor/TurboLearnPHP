<?php

// Connect to MySQL database using mysqli
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to execute a dynamic SQL query
function executeDynamicQuery($mysqli, $sql) {
    // Use mysqli_real_query for executing complex SQL
    if ($mysqli->real_query($sql)) {
        // Store the result set if the query is SELECT
        if ($result = $mysqli->store_result()) {
            // Fetch associative array of results
            while ($row = $result->fetch_assoc()) {
                print_r($row);
            }
            // Free the result set
            $result->free();
        } else {
            echo "No results returned.\n";
        }
    } else {
        echo "Query Error: " . $mysqli->error . "\n";
    }
}

// Example dynamic SQL execution
$userInput = 'sample input';
$dynamicSQL = "SELECT * FROM my_table WHERE column = '$userInput'";

// Be careful with user input to avoid SQL injection
executeDynamicQuery($mysqli, $dynamicSQL);

// Close the database connection
$mysqli->close();
?>