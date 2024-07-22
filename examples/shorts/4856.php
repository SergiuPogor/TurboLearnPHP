<?php
// Example function to safely access array keys
function getSafeArrayValue(array $array, string $key, $default = null) {
    // Check if the key is set and not null
    return isset($array[$key]) ? $array[$key] : $default;
}

// Example function to use array_key_exists
function getArrayValueWithKeyCheck(array $array, string $key, $default = null) {
    // Check if the key exists in the array, even if it's null
    return array_key_exists($key, $array) ? $array[$key] : $default;
}

// Example usage
$userData = [
    'name' => 'Alice Smith',
    'email' => null  // Key exists but value is null
];

// Safely access existing and non-existing keys
$name = getSafeArrayValue($userData, 'name', 'Unknown');
$age = getArrayValueWithKeyCheck($userData, 'age', 'Not provided');

// Output results
echo "Name: $name\n"; // Output: Name: Alice Smith
echo "Age: $age\n";   // Output: Age: Not provided
?>