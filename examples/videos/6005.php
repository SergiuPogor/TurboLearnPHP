<?php

// Function to demonstrate the use of mysqli_error_list
function handleMySQLConnection($host, $user, $password, $database) {
    // Create a connection
    $mysqli = new mysqli($host, $user, $password, $database);

    // Check for connection error
    if ($mysqli->connect_error) {
        echo "Connection failed: " . $mysqli->connect_error . "\n";
        return;
    }

    // Example query that might cause an error
    $query = "SELECT * FROM non_existing_table";

    if (!$result = $mysqli->query($query)) {
        // Retrieve error list
        $errorList = $mysqli->error_list;

        echo "Query Error Details:\n";
        foreach ($errorList as $error) {
            echo "Error Code: " . $error['errno'] . "\n";
            echo "Error Message: " . $error['error'] . "\n";
            echo "SQL State: " . $error['sqlstate'] . "\n";
            echo "-------------------------\n";
        }
    }

    // Close the connection
    $mysqli->close();
}

// Call the function with example credentials
handleMySQLConnection('localhost', 'user', 'password', 'database');

?>