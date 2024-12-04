<?php
// Example 1: Using array_slice() to get a portion of the array without modifying it
$array = [1, 2, 3, 4, 5];
$slicedArray = array_slice($array, 1, 3); // Get elements from index 1 to 3
print_r($slicedArray); // Output: [2, 3, 4]

// Example 2: Using array_splice() to modify the original array
$array = [1, 2, 3, 4, 5];
array_splice($array, 1, 3, [6, 7]); // Remove 3 elements from index 1 and replace with [6, 7]
print_r($array); // Output: [1, 6, 7, 5]

// Example 3: Using array_splice() to delete elements from the array
$array = [1, 2, 3, 4, 5];
array_splice($array, 2, 2); // Remove 2 elements starting from index 2
print_r($array); // Output: [1, 2, 5]
?>