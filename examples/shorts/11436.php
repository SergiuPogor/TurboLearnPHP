<?php
// Example using array_slice to extract a portion of an array (without modifying the original array)
$array = [1, 2, 3, 4, 5, 6];
$sliced = array_slice($array, 2, 3); // Returns [3, 4, 5], original array is unchanged
var_dump($sliced); 

// Example using array_splice to remove and replace elements in an array
$array = [1, 2, 3, 4, 5, 6];
$spliced = array_splice($array, 2, 3, ['x', 'y', 'z']); 
// Removes 3 elements starting at index 2, and replaces them with ['x', 'y', 'z']
var_dump($array); // The original array is now [1, 2, 'x', 'y', 'z', 6]

// Example of modifying the original array with array_splice, without replacement
$array = [10, 20, 30, 40, 50];
$spliced = array_splice($array, 1, 2); 
// Removes 2 elements starting from index 1
var_dump($array); // The original array is now [10, 40, 50]
?>