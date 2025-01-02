<?php

// Database connection parameters
$host = 'localhost';
$username = 'myuser';
$password = 'mypassword';
$dbname = 'mydb';

// Attempt to connect to the MySQL database
$connection = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$connection) {
    // Retrieve and display the error message
    die("Connection failed: " . mysqli_connect_error());
}

// Perform database operations
$query = "SELECT * FROM my_table";
$result = mysqli_query($connection, $query);

// Check for query errors
if (!$result) {
    // Retrieve and display the query error message
    die("Query failed: " . mysqli_error($connection));
}

// Fetch and display results
while ($row = mysqli_fetch_assoc($result)) {
    echo "Data: " . $row['data_column'] . PHP_EOL;
}

// Close the connection
mysqli_close($connection);
?>