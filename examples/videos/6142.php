<?php
// Function to demonstrate the use of pg_cancel_query()
function executeAndCancelQuery($connection, $query) {
    // Start a long-running query
    $result = pg_query($connection, $query);
    
    // Check if the query is successful
    if ($result) {
        // Simulate a wait to let the query run for a bit
        sleep(5); // Adjust the duration as needed

        // Attempt to cancel the long-running query
        if (pg_cancel_query($connection, pg_last_query($connection))) {
            echo "Query cancelled successfully!\n";
        } else {
            echo "Failed to cancel the query.\n";
        }
    } else {
        echo "Query execution failed: " . pg_last_error($connection) . "\n";
    }
}

// Connection details
$host = "localhost";
$dbname = "your_database";
$user = "your_username";
$password = "your_password";

// Establish connection
$connection = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$connection) {
    die("Connection failed: " . pg_last_error());
}

// Example of a long-running query (e.g., selecting from a large table)
$longQuery = "SELECT * FROM large_table WHERE some_condition;";

// Execute the long query and attempt to cancel it
executeAndCancelQuery($connection, $longQuery);

// Close the connection
pg_close($connection);
?>