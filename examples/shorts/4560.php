<?php

// Example of using fgetcsv for efficient CSV file handling

$csvFile = 'data.csv';

// Check if the file exists and is readable
if (($handle = fopen($csvFile, 'r')) !== false) {
    // Initialize an empty array to store CSV data
    $csvData = [];

    // Loop through each line of the CSV file using fgetcsv
    while (($data = fgetcsv($handle)) !== false) {
        // Add each row as an array to $csvData
        $csvData[] = $data;
    }

    // Close the file handle
    fclose($handle);

    // Output the CSV data
    var_dump($csvData);
} else {
    echo "Error: Unable to open $csvFile for reading.";
}

?>