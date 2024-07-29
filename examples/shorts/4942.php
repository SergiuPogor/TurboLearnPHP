<?php

function processLargeCSV($filePath)
{
    // Check if file exists
    if (!file_exists($filePath) || !is_readable($filePath)) {
        throw new Exception("File not accessible or does not exist.");
    }

    // Open the file in read mode
    $handle = fopen($filePath, 'rb');

    if ($handle === false) {
        throw new Exception("Unable to open file.");
    }

    // Process each row of the CSV file
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        // Example processing: just print each row
        // In real applications, process the data as needed
        print_r($data);
    }

    // Close the file handle
    fclose($handle);
}

// Example usage
$csvFile = '/path/to/large.csv';

try {
    processLargeCSV($csvFile);
    echo "CSV file processed successfully!";
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}

?>