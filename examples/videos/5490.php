<?php

// Example 1: Basic usage of gzfile() to read a gzip-compressed text file

$gzipFile = '/tmp/test/input.txt.gz';

if (file_exists($gzipFile)) {
    $lines = gzfile($gzipFile);

    // Process each line read from the gzipped file
    foreach ($lines as $line) {
        echo $line; // Output the line, process it as needed
    }
} else {
    echo "The file does not exist.\n";
}

// Example 2: Efficient processing of large gzip files using gzfile() with memory optimization

$gzipLogFile = '/tmp/test/access.log.gz';
$maxLinesToProcess = 1000;
$lineCount = 0;

if (file_exists($gzipLogFile)) {
    $lines = gzfile($gzipLogFile);

    foreach ($lines as $line) {
        // Process each line up to a maximum limit to avoid excessive memory usage
        echo $line;
        $lineCount++;

        if ($lineCount >= $maxLinesToProcess) {
            echo "Processing limit reached. Stopping further reading.\n";
            break;
        }
    }
} else {
    echo "Log file does not exist.\n";
}

// Example 3: Combining gzfile() with regex to search for specific patterns in a gzip file

$gzipCSVFile = '/tmp/test/data.csv.gz';
$searchPattern = '/^Error:/'; // Looking for lines starting with 'Error:'

if (file_exists($gzipCSVFile)) {
    $lines = gzfile($gzipCSVFile);

    foreach ($lines as $line) {
        // Check if the line matches the search pattern
        if (preg_match($searchPattern, $line)) {
            echo "Found error line: " . $line;
        }
    }
} else {
    echo "CSV file does not exist.\n";
}

// Example 4: Handling multiple gzip files in a directory and reading them with gzfile()

$gzipDirectory = '/tmp/test/';
$files = scandir($gzipDirectory);

foreach ($files as $file) {
    if (preg_match('/\.gz$/', $file)) {
        $filePath = $gzipDirectory . $file;
        $lines = gzfile($filePath);

        echo "Reading file: $filePath\n";

        foreach ($lines as $line) {
            // Perform some operation on each line
            echo $line;
        }

        echo "Finished reading file: $filePath\n";
    }
}

?>