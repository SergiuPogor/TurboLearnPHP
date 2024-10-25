<?php
// Increase memory limit if necessary
ini_set('memory_limit', '256M'); // Adjust this value as needed

// Function to process a large array using a generator
function processLargeArray(array $data): Generator {
    foreach ($data as $item) {
        // Simulate processing the item
        yield $item * 2; // Example processing logic
    }
}

// Simulating a large array
$largeArray = range(1, 1000000); // 1 million items

// Using the generator to process data without memory overflow
foreach (processLargeArray($largeArray) as $result) {
    // Do something with the processed result
    // E.g., storing or displaying the result
    // Here, we limit the output for demonstration purposes
    if ($result % 100000 === 0) {
        echo "Processed: $result\n";
    }
}

// Alternatively, handle large arrays by splitting them
function processInChunks(array $data, int $chunkSize): void {
    $chunks = array_chunk($data, $chunkSize);
    foreach ($chunks as $chunk) {
        // Process each chunk
        foreach ($chunk as $item) {
            // Process each item
            // Example: echo "Item: $item\n";
        }
    }
}

// Using the chunk processing method
processInChunks($largeArray, 100000); // Process in chunks of 100,000