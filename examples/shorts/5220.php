<?php
// Associative array with unsorted keys
$data = [
    'b' => 'banana',
    'a' => 'apple',
    'c' => 'cherry'
];

// Sort the array by keys in reverse order
krsort($data);

// Output the sorted array
print_r($data);

// Example with more complex data
$info = [
    '2024' => 'Year of AI',
    '2022' => 'Year of the Tiger',
    '2023' => 'Year of the Rabbit'
];

// Sort the associative array by keys in reverse order
krsort($info);

// Output the sorted array
print_r($info);
?>