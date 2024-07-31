<?php
// Function to perform deep merge of arrays using array_replace_recursive
function mergeNestedArrays(array $base, array $overwrite): array {
    return array_replace_recursive($base, $overwrite);
}

// Example arrays
$baseArray = [
    'user' => [
        'name' => 'John',
        'contact' => ['email' => 'john@example.com', 'phone' => '1234567890'],
    ],
    'settings' => ['theme' => 'light']
];

$overwriteArray = [
    'user' => [
        'contact' => ['email' => 'john.doe@example.com']
    ],
    'settings' => ['theme' => 'dark', 'language' => 'en']
];

// Perform the merge
$mergedArray = mergeNestedArrays($baseArray, $overwriteArray);

// Output the result
print_r($mergedArray);
?>