// Example demonstrating PHP generators
function largeDatasetGenerator($limit) {
    for ($i = 1; $i <= $limit; $i++) {
        yield $i; // Yielding each value instead of returning an array
    }
}

// Usage
$generator = largeDatasetGenerator(1000000); // Generates numbers from 1 to 1,000,000
foreach ($generator as $value) {
    // Process each value without loading all into memory at once
    echo $value . " ";
}