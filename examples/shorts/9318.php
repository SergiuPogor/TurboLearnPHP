<?php

// Efficiently handle large arrays in PHP

// Simulate a large array
$largeArray = range(1, 1000000); // Array with 1 million elements

// Method 1: Using foreach (Standard method)
$sum1 = 0;
foreach ($largeArray as $value) {
    $sum1 += $value; // Summing values
}

// Method 2: Using array_sum (Built-in function)
$sum2 = array_sum($largeArray); // Optimized built-in function

// Method 3: Using a generator (Memory efficient)
function generateNumbers($max) {
    for ($i = 1; $i <= $max; $i++) {
        yield $i;
    }
}
$sum3 = 0;
foreach (generateNumbers(1000000) as $value) {
    $sum3 += $value; // Summing values
}

// Display results
echo "Sum using foreach: $sum1\n";
echo "Sum using array_sum: $sum2\n";
echo "Sum using generator: $sum3\n";

?>