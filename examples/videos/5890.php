<?php

// Function to execute a query and check for warnings
function executeQueryWithWarnings($mysqli, $query) {
    // Execute the query
    if ($mysqli->query($query) === TRUE) {
        echo "Query executed successfully.\n";
    } else {
        echo "Error executing query: " . $mysqli->error . "\n";
    }

    // Get any warnings from the last executed query
    $warnings = $mysqli->get_warnings();

    // Check if there are warnings
    if ($warnings) {
        echo "Warnings found:\n";
        do {
            echo "Level: " . $warnings->level . "\n";
            echo "Code: " . $warnings->code . "\n";
            echo "Message: " . $warnings->message . "\n";
            $warnings = $warnings->next();
        } while ($warnings);
    } else {
        echo "No warnings.\n";
    }
}

// Create a new MySQLi connection
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Example query that may produce warnings
$query = "INSERT INTO my_table (non_existent_column) VALUES ('value')"; // This will trigger a warning

// Execute the query and check for warnings
executeQueryWithWarnings($mysqli, $query);

// Close the MySQLi connection
$mysqli->close();

?>