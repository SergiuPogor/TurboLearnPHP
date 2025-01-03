<?php

// Connect to the database
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform a query
$query = "SELECT id, name, description FROM products";
$result = $mysqli->query($query);

if ($result) {
    // Fetch the first row
    while ($row = $result->fetch_assoc()) {
        // Get the lengths of each field
        $lengths = $result->fetch_lengths();

        // Output field data with their lengths
        foreach ($row as $key => $value) {
            echo "Field: $key" . PHP_EOL;
            echo "Value: $value" . PHP_EOL;
            echo "Length: " . $lengths[$key] . " bytes" . PHP_EOL;
            echo "-------------------" . PHP_EOL;
        }
    }
}

// Close the connection
$mysqli->close();

// Function to demonstrate length retrieval in multiple ways
function fetchProductLengths($mysqli) {
    $query = "SELECT id, name, description FROM products";
    $result = $mysqli->query($query);
    $lengths = [];
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $lengths[] = $result->fetch_lengths();
        }
    }
    
    return $lengths;
}

// Fetch and display lengths for another use case
$productLengths = fetchProductLengths($mysqli);
foreach ($productLengths as $length) {
    echo "Lengths: " . implode(", ", $length) . PHP_EOL;
}

?>