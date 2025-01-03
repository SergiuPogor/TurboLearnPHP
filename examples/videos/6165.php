<?php

// Create a new mysqli connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the MySQL client version
$client_version = mysqli_get_client_version();

// Display the MySQL client version
echo "MySQL Client Version: " . $client_version . "\n";

// Example of a query to test compatibility
$query = "SELECT * FROM some_table LIMIT 1";

// Execute the query
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        // Process the result set
        echo "Data: " . json_encode($row) . "\n";
    }
    $result->free();
} else {
    // Handle query errors
    echo "Error executing query: " . $mysqli->error . "\n";
}

// Close the connection
$mysqli->close();

?>