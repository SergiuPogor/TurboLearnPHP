<?php
// Example 1: Using array_slice() to extract elements without modifying the original array
$fruits = ['apple', 'banana', 'cherry', 'date', 'elderberry'];
$sliced = array_slice($fruits, 1, 3); // Extract from index 1, 3 elements
print_r($sliced); // Output: ['banana', 'cherry', 'date']

// Example 2: Using array_splice() to modify the original array
$fruits = ['apple', 'banana', 'cherry', 'date', 'elderberry'];
$spliced = array_splice($fruits, 1, 3); // Remove 3 elements from index 1
print_r($fruits); // Output: ['apple', 'elderberry'] (Original array is modified)
print_r($spliced); // Output: ['banana', 'cherry', 'date'] (Removed elements)
?>