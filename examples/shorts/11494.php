<?php
// Example of using array_slice
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];
$slicedFruits = array_slice($fruits, 1, 3); // Extract a portion without modifying original array
print_r($slicedFruits);

// Example of using array_splice
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];
$removedFruits = array_splice($fruits, 1, 2); // Removes elements from the array, modifying it
print_r($fruits); // Original array is changed

// Using array_splice to replace elements
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];
array_splice($fruits, 1, 2, ["kiwi", "lemon"]); // Replaces elements
print_r($fruits); // Array with replacements

// Using array_slice in a non-destructive manner
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];
$slicedFruits = array_slice($fruits, 2);
print_r($slicedFruits); // Original array stays the same
?>