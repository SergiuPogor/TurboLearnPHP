<?php
// Example of using PHP generators to handle large data sets

// Generator function to yield data instead of loading all at once
function largeDataGenerator($data) {
    foreach ($data as $item) {
        yield $item;
    }
}

// Simulate a large data set
$largeDataSet = range(1, 1000000);

// Create generator instance
$dataGenerator = largeDataGenerator($largeDataSet);

// Process data without consuming excessive memory
foreach ($dataGenerator as $data) {
    // Process each item
    echo "Processing: $data\n";
    // Memory efficient as only one item is in memory at a time
}
?>