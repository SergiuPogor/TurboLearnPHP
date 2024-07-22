<?php

// Example: PHP Generators for Memory Efficiency

// Generator function to simulate fetching large dataset
function generateLargeData($max) {
    for ($i = 1; $i <= $max; $i++) {
        yield $i;
    }
}

// Usage example: Processing large dataset
$max = 1000000; // Example: 1 million items
$data = generateLargeData($max);

foreach ($data as $item) {
    // Process each item here
    // No need to load all data into memory at once
    // Processed items are released from memory after each iteration
}

?>