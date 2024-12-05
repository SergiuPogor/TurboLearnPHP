<?php
// Example 1: Using array_walk() to modify the original array
$array = [1, 2, 3, 4];
array_walk($array, fn(&$item) => $item *= 2);
print_r($array);  // Output: [2, 4, 6, 8]

// Example 2: Using array_map() to return a new array
$array = [1, 2, 3, 4];
$newArray = array_map(fn($item) => $item * 2, $array);
print_r($newArray);  // Output: [2, 4, 6, 8]

// Example 3: Using array_walk() with a reference to modify an array in place
$array = ['apple', 'banana', 'cherry'];
array_walk($array, function(&$value) {
    $value = strtoupper($value);  // Convert all array values to uppercase
});
print_r($array);  // Output: ['APPLE', 'BANANA', 'CHERRY']

// Example 4: Using array_map() to create a new array with transformed values
$array = [10, 20, 30, 40];
$transformedArray = array_map(fn($val) => $val + 5, $array);
print_r($transformedArray);  // Output: [15, 25, 35, 45]
?>