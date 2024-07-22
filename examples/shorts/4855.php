<?php
// Example function to safely access array elements
function getArrayValue(array $array, string $key, $default = null) {
    // Check if key exists in the array
    return $array[$key] ?? $default;
}

// Example usage
$userData = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com'
];

// Safely access existing and non-existing keys
$name = getArrayValue($userData, 'name', 'Unknown');
$age = getArrayValue($userData, 'age', 'Not provided');

// Output results
echo "Name: $name\n"; // Output: Name: John Doe
echo "Age: $age\n";   // Output: Age: Not provided
?>