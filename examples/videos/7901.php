<?php

/**
 * Converts a CSV file with headers into an associative array using str_getcsv.
 */
function csvToArray(string $filePath): array
{
    if (!file_exists($filePath) || !is_readable($filePath)) {
        throw new InvalidArgumentException("File not found or not readable: $filePath");
    }

    $data = [];
    $headers = null;

    // Open CSV file
    $file = fopen($filePath, 'r');

    while (($row = fgetcsv($file)) !== false) {
        if (!$headers) {
            // First row as headers
            $headers = $row;
        } else {
            // Combine headers and values to associative array
            $data[] = array_combine($headers, $row);
        }
    }
    fclose($file);

    return $data;
}

// Alternative function using str_getcsv to process CSV lines directly.
function csvToArrayUsingStrGetCsv(string $filePath): array
{
    if (!file_exists($filePath) || !is_readable($filePath)) {
        throw new InvalidArgumentException("File not found or not readable: $filePath");
    }

    $data = [];
    $fileContents = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $headers = str_getcsv(array_shift($fileContents)); // First row as headers

    foreach ($fileContents as $line) {
        $data[] = array_combine($headers, str_getcsv($line));
    }

    return $data;
}

// Example Usage:
try {
    // CSV file to parse (example path)
    $filePath = '/tmp/test/input.csv';

    // Convert CSV to array using the first method
    $result1 = csvToArray($filePath);

    // Convert CSV to array using str_getcsv (alternate)
    $result2 = csvToArrayUsingStrGetCsv($filePath);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}