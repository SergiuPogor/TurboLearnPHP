<?php

// Example demonstrating performance differences between foreach and for loops in PHP

// Creating a sample associative array
$associativeArray = [
    "name" => "John",
    "age" => 30,
    "city" => "New York",
    "country" => "USA"
];

// Using foreach to iterate over the associative array
foreach ($associativeArray as $key => $value) {
    echo "$key: $value\n";
}

// Creating a sample numeric array
$numericArray = [10, 20, 30, 40, 50];

// Using for loop to iterate over the numeric array
for ($i = 0; $i < count($numericArray); $i++) {
    echo "Index $i: {$numericArray[$i]}\n";
}