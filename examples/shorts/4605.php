<?php

// Example: Using SplFileObject for file handling
$fileName = 'example.txt';

// Create a new SplFileObject instance
$file = new SplFileObject($fileName, 'r+');

// Read file line by line
while (!$file->eof()) {
    $line = $file->fgets();
    echo "Read line: $line";
}

// Write to the file
$file->fwrite("Appending new content.\n");

// Close the file
$file = null; // Explicitly close the file to release resources