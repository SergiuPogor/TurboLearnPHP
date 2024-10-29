<?php

// Example code demonstrating how to use array_count_values to find duplicates

// Sample array with potential duplicates
$sampleArray = [
    'apple', 'banana', 'orange', 
    'apple', 'grape', 'banana', 
    'kiwi', 'banana', 'kiwi'
];

// Count the values in the array
$valueCounts = array_count_values($sampleArray);

// Filter for duplicates
$duplicates = array_filter($valueCounts, function($count) {
    return $count > 1; // Only keep items that appear more than once
});

// Display duplicates
if (!empty($duplicates)) {
    echo "Duplicate values found:\n";
    foreach ($duplicates as $value => $count) {
        echo "$value appears $count times\n";
    }
} else {
    echo "No duplicates found.";
}