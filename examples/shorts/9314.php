<?php

// Example: Fast PHP Functions for Array Manipulation

// Sample array for manipulation
$data = range(1, 100000);  // Create an array with 100,000 elements

// Using array_map for fast transformations
$squared = array_map(function($n) {
    return $n * $n;  // Squaring each element
}, $data);

// Using array_filter for fast filtering
$evens = array_filter($data, function($n) {
    return $n % 2 === 0;  // Filtering even numbers
});

// Using foreach as a slower alternative
$filteredEvens = [];
foreach ($data as $n) {
    if ($n % 2 === 0) {
        $filteredEvens[] = $n;  // Storing even numbers
    }
}

// Output example results
echo "Squared Numbers: " . implode(", ", array_slice($squared, 0, 10)) . "...\n";  // Display first 10 squared
echo "Even Numbers: " . implode(", ", array_slice($evens, 0, 10)) . "...\n";  // Display first 10 evens
?>