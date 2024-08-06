<?php
// Associative array with unsorted keys
$fruits = [
    'banana' => 'yellow',
    'apple' => 'green',
    'cherry' => 'red'
];

// Sort the array by keys in ascending order
ksort($fruits);

// Output the sorted array
print_r($fruits);

// Example with numeric keys as strings
$items = [
    '10' => 'item10',
    '1' => 'item1',
    '20' => 'item20'
];

// Sort the associative array by keys in ascending order
ksort($items);

// Output the sorted array
print_r($items);
?>