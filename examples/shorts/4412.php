<?php

// Example: Array Chunking
$largeArray = range(1, 100); // Example large array of 100 elements

$chunks = array_chunk($largeArray, 10); // Chunk array into arrays of 10 elements each

// Display chunks
foreach ($chunks as $index => $chunk) {
    echo "Chunk " . ($index + 1) . ": " . implode(', ', $chunk) . "<br>";
}

?>