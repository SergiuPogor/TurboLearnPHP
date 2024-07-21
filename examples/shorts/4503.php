// Example demonstrating PHP generators for efficient memory management

// Define a generator function
function largeDatasetGenerator($max) {
    for ($i = 1; $i <= $max; $i++) {
        yield $i;
    }
}

// Iterate over the generator without loading all data into memory
foreach (largeDatasetGenerator(1000000) as $value) {
    // Process each value
    echo $value . "\n";
}