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

// Example of executing a query that returns multiple result sets
$query = "
    CALL multi_result_proc();  -- Assuming this stored procedure returns multiple result sets
";

// Execute the query
if (mysqli_multi_query($connection, $query)) {
    do {
        // Store the first result set
        if ($result = mysqli_store_result($connection)) {
            // Fetch and display results
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $column => $value) {
                    echo "$column: $value\n";
                }
                echo "--------------------\n";
            }
            // Free result set
            mysqli_free_result($result);
        }

        // Check for more results
    } while (mysqli_more_results($connection) && mysqli_next_result($connection));
} else {
    // Handle query error
    echo "Error executing query: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>