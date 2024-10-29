<?php

// Sample CSV string
$csvString = "name,age,city\nJohn Doe,28,New York\nJane Smith,34,Los Angeles";

// Parsing CSV data using str_getcsv
$rows = array_map('str_getcsv', explode("\n", $csvString));

// Creating an associative array
$data = [];
foreach ($rows as $index => $row) {
    if ($index === 0) {
        $headers = $row; // Store headers
    } else {
        $data[] = array_combine($headers, $row); // Combine headers with values
    }
}

// Output the parsed data
foreach ($data as $person) {
    echo "Name: " . htmlspecialchars($person['name']) . 
         ", Age: " . htmlspecialchars($person['age']) . 
         ", City: " . htmlspecialchars($person['city']) . "<br>";
}

?>