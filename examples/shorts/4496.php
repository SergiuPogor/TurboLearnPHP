// Example code demonstrating PHP generator for efficient data processing
function largeDatasetGenerator() {
    foreach (range(1, 1000000) as $number) {
        yield $number;
    }
}

// Usage example
foreach (largeDatasetGenerator() as $value) {
    // Process $value without loading all data into memory
    echo $value . "\n";
}