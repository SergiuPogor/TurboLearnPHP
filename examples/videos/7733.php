<?php

// Example of resolving memory limit issues in PHP

// Setting a custom memory limit for this script
ini_set('memory_limit', '256M');

// Function to process a large array
function processLargeDataSet($data) {
    $result = [];
    foreach ($data as $item) {
        // Simulating some processing
        if (is_array($item)) {
            $result[] = array_map('strtoupper', $item);
        }
    }
    return $result;
}

// Generating a large dataset
$largeDataSet = [];
for ($i = 0; $i < 100000; $i++) {
    $largeDataSet[] = ['name' => 'item' . $i];
}

// Monitoring memory usage before and after processing
echo "Memory usage before: " . memory_get_usage() . " bytes" . PHP_EOL;

// Process the data
$processedData = processLargeDataSet($largeDataSet);

echo "Memory usage after: " . memory_get_usage() . " bytes" . PHP_EOL;

// Free up memory by unsetting variables
unset($largeDataSet);
unset($processedData);

// Final memory usage check
echo "Memory usage after cleanup: " . memory_get_usage() . " bytes" . PHP_EOL;

// Example of using memory_get_peak_usage to track memory peak
echo "Peak memory usage: " . memory_get_peak_usage() . " bytes" . PHP_EOL;

// Forcing a garbage collection to free unused memory
gc_collect_cycles();

?>