<?php

// Function to demonstrate the use of mysqli_data_seek
function fetchSpecificRow($connection, $query, $rowNumber) {
    // Perform the query
    $result = mysqli_query($connection, $query);
    
    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Get total rows
    $totalRows = mysqli_num_rows($result);

    // Check if the row number is valid
    if ($rowNumber < 0 || $rowNumber >= $totalRows) {
        die("Row number is out of bounds.");
    }

    // Move the pointer to the specified row
    mysqli_data_seek($result, $rowNumber);

    // Fetch and return the specific row
    return mysqli_fetch_assoc($result);
}

// Database connection parameters
$host = 'localhost';
$username = 'user';
$password = 'password';
$database = 'test_db';

// Create connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Example query to fetch data
$query = "SELECT id, name, email FROM users";

// Fetch a specific row (e.g., row number 2)
$specificRow = fetchSpecificRow($connection, $query, 2);

// Output the specific row
echo "Fetched Row: " . json_encode($specificRow);

// Closing the connection
mysqli_close($connection);