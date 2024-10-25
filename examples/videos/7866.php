<?php

// Generator function to yield numbers up to a specified limit
function generateNumbers(int $limit) {
    for ($i = 1; $i <= $limit; $i++) {
        yield $i; // Yielding value instead of returning
    }
}

// Using the generator
echo "Using generator to display numbers:\n";
foreach (generateNumbers(10) as $number) {
    echo $number . "\n";
}

// Generator function for reading a file line by line
function readLines(string $filePath) {
    $file = fopen($filePath, 'r');
    if (!$file) {
        throw new Exception("Cannot open file: $filePath");
    }
    
    while (($line = fgets($file)) !== false) {
        yield trim($line); // Yielding each line without additional spaces
    }
    
    fclose($file); // Closing the file
}

// Example usage of readLines generator
try {
    echo "\nReading lines from a file:\n";
    foreach (readLines('/tmp/test/input.txt') as $line) {
        echo $line . "\n"; // Process each line as it's read
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>