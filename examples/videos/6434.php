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

// Example of updating a table and refreshing results
$updateQuery = "UPDATE users SET last_login = NOW() WHERE id = 1";

if (mysqli_query($connection, $updateQuery)) {
    echo "User last login updated.\n";
    // Refresh the cached results for the 'users' table
    if (mysqli_refresh($connection, MYSQLI_REFRESH_TABLES)) {
        echo "Table 'users' refreshed successfully.\n";
    } else {
        echo "Failed to refresh table: " . mysqli_error($connection);
    }
} else {
    echo "Error updating record: " . mysqli_error($connection);
}

// Execute another query to demonstrate fresh results
$result = mysqli_query($connection, "SELECT * FROM users WHERE id = 1");
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "User ID: " . $row['id'] . "\n";
        echo "Last Login: " . $row['last_login'] . "\n";
    }
    mysqli_free_result($result);
} else {
    echo "Error fetching record: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>