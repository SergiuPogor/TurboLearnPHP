<?php
// Example demonstrating PHP's null coalescing operator and its limitations

// Function to demonstrate null coalescing operator
function getValue($data) {
    // Accessing 'key' which might not be set
    return $data['key'] ?? 'default';
}

// Examples
$data1 = [
    'key' => 'value'
];
$data2 = [
    'key' => null
];
$data3 = [
    // 'key' is not set
];

// Output of function calls
echo getValue($data1); // Output: value
echo "\n";
echo getValue($data2); // Output: default
echo "\n";
echo getValue($data3); // Output: default

// Example with empty value
$emptyArray = [
    'key' => []
];
$emptyString = [
    'key' => ''
];

// Checking with empty array and string
echo getValue($emptyArray); // Output: default
echo "\n";
echo getValue($emptyString); // Output: default

// Use isset() to check if 'key' is set
function getValueWithIsset($data) {
    return isset($data['key']) ? $data['key'] : 'default';
}

// Output of function calls with isset
echo getValueWithIsset($data1); // Output: value
echo "\n";
echo getValueWithIsset($data2); // Output: default
echo "\n";
echo getValueWithIsset($data3); // Output: default
echo "\n";
echo getValueWithIsset($emptyArray); // Output: Array
echo "\n";
echo getValueWithIsset($emptyString); // Output: 
?>