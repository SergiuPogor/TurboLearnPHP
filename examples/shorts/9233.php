<?php
// Function to read a file using streams
function readFileStream($filePath) {
    // Open the file for reading
    $handle = fopen($filePath, 'r');

    // Check if the file was opened successfully
    if ($handle) {
        // Read the file line by line
        while (($line = fgets($handle)) !== false) {
            echo $line; // Output the line
        }
        fclose($handle); // Close the file handle
    } else {
        echo "Error opening the file.";
    }
}

// Function to write to a file using streams
function writeFileStream($filePath, $data) {
    // Open the file for writing (creates the file if it doesn't exist)
    $handle = fopen($filePath, 'a');

    // Check if the file was opened successfully
    if ($handle) {
        fwrite($handle, $data); // Write data to the file
        fclose($handle); // Close the file handle
        echo "Data written to the file.";
    } else {
        echo "Error opening the file for writing.";
    }
}

// Sample usage
readFileStream('/tmp/test/input.txt');
writeFileStream('/tmp/test/input.txt', "New data added.\n");