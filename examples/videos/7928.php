<?php
// Using array_map to transform an array in PHP

// Sample data: an array of user names
$userNames = ['Alice', 'Bob', 'Charlie', 'David'];

// Function to transform each name to uppercase
function transformToUpper($name) {
    return strtoupper($name);
}

// Using array_map to apply the transformation
$upperCaseNames = array_map('transformToUpper', $userNames);

// Example of using a closure for inline transformation
$reversedNames = array_map(function($name) {
    return strrev($name);
}, $userNames);

// Combining multiple transformations in one call
$transformedNames = array_map(function($name) {
    return [
        'original' => $name,
        'upper' => strtoupper($name),
        'reversed' => strrev($name)
    ];
}, $userNames);

// Displaying the results
foreach ($transformedNames as $result) {
    echo "Original: {$result['original']}, Upper: {$result['upper']}, Reversed: {$result['reversed']}\n";
}

// Example with files: reading names from a text file and transforming
$namesFromFile = file('/tmp/test/input.txt', FILE_IGNORE_NEW_LINES);
$formattedNames = array_map('transformToUpper', $namesFromFile);

// Output formatted names
foreach ($formattedNames as $name) {
    echo "$name\n";
}
?>