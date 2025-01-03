<?php

// Database connection parameters
$host = 'localhost';
$dbname = 'testdb';
$user = 'yourusername';
$password = 'yourpassword';

// Establish a connection to the MySQL database
$connection = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Example of a failing query
$query = "SELECT * FROM non_existent_table";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if (!$result) {
    // Get the error message from the last MySQL operation
    $error_message = mysqli_error($connection);
    echo "Query failed: $error_message\n";
} else {
    // Process results if the query was successful
    while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $column => $value) {
            // Print each field and its value
            echo "$column: $value\n";
        }
        echo "--------------------\n";
    }
}

// Close the database connection
mysqli_close($connection);
?>