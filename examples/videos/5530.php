<?php

// Define the file path
$filePath = '/tmp/test/input.txt';

// Create a fileinfo resource
$finfo = finfo_open(FILEINFO_MIME_TYPE); // Get mime type

// Check if finfo_open() was successful
if ($finfo) {
    // Get the MIME type of the file
    $mimeType = finfo_file($finfo, $filePath);
    
    // Output the MIME type
    echo "MIME type of the file: " . $mimeType . PHP_EOL;

    // Always close the fileinfo resource when done
    finfo_close($finfo);
} else {
    // Handle error in opening fileinfo resource
    echo "Error opening fileinfo resource." . PHP_EOL;
}

// Another example using finfo_open with a specific mode
$finfo2 = finfo_open(FILEINFO_MIME); // Get MIME type and encoding

// Use a loop to handle multiple files
$files = ['/tmp/test/input.txt', '/tmp/test/input.zip'];

foreach ($files as $file) {
    if (file_exists($file)) {
        // Get the MIME type for each file
        $mimeType = finfo_file($finfo2, $file);
        echo "MIME type of {$file}: " . $mimeType . PHP_EOL;
    } else {
        echo "File {$file} does not exist." . PHP_EOL;
    }
}

// Close the second fileinfo resource
finfo_close($finfo2);
?>