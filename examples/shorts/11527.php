<?php
// Example using array_map
$numbers = [1, 2, 3, 4, 5];
$mapped = array_map(fn($number) => $number * 2, $numbers);
print_r($mapped);

// Example using array_walk
$numbers = [1, 2, 3, 4, 5];
array_walk($numbers, fn(&$number) => $number *= 2);
print_r($numbers);

// Use case: Compare results of both functions
$numbers = [1, 2, 3, 4, 5];

// Using array_map to create a transformed array
$mapped = array_map(fn($number) => $number + 10, $numbers);
print_r($mapped); // New array with +10

// Using array_walk to modify the original array
array_walk($numbers, fn(&$number) => $number += 10);
print_r($numbers); // Original array modified
?>