<?php
// Example demonstrating the issue with PHP array key collisions

// Function that adds items to an associative array
function addItem(array &$array, string $key, $value): void {
    if (array_key_exists($key, $array)) {
        echo "Warning: Key '{$key}' already exists and will be overwritten.\n";
    }
    $array[$key] = $value;
}

// Example usage
$data = [
    'user1' => 'Alice',
    'user2' => 'Bob'
];

addItem($data, 'user2', 'Charlie'); // This will overwrite the 'user2' key

print_r($data); // Output will be ['user1' => 'Alice', 'user2' => 'Charlie']
?>