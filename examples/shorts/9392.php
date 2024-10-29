<?php
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform an unbuffered query
$query = "SELECT * FROM large_table WHERE condition";
$result = $mysqli->query($query, MYSQLI_USE_RESULT);

// Using mysqli_num_rows with unbuffered queries will not work as expected
if ($result) {
    echo "Number of rows: " . mysqli_num_rows($result); // This will return 0 or an error

    // Buffer the result to get the number of rows correctly
    $buffered_result = $mysqli->store_result();
    echo "Buffered Number of rows: " . mysqli_num_rows($buffered_result);
}

// Clean up
$result->close();
$mysqli->close();