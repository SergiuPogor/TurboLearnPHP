<?php
// Example demonstrating the issue with PHP's array_column and objects

// Function to convert objects to arrays
function objectsToArray($objects) {
    return array_map(function($object) {
        return (array) $object;
    }, $objects);
}

// Example objects
$objects = [
    (object) ['id' => 1, 'name' => 'Alice'],
    (object) ['id' => 2, 'name' => 'Bob'],
    (object) ['id' => 3, 'name' => 'Charlie']
];

// Convert objects to arrays
$converted = objectsToArray($objects);

// Use array_column to extract 'name' column
$names = array_column($converted, 'name');

// Output result
print_r($names); // Output: Array ( [0] => Alice [1] => Bob [2] => Charlie )

// Example with original array of objects (will fail)
try {
    $namesFail = array_column($objects, 'name'); // This will not work as expected
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>