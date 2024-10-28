<?php
// File: /tmp/test/include_path_example.php

// Function to demonstrate PHP's include_path
function includeFileExample() {
    // Set the include path to the current directory and the '/tmp/test' folder
    set_include_path(get_include_path() . PATH_SEPARATOR . '/tmp/test');

    // Try to include a file that should exist in the include path
    $filename = 'input.txt';
    
    // Check if the file exists in the include path
    if (file_exists($filename)) {
        include $filename; // Include the file if found
        echo "File '$filename' included successfully.\n";
    } else {
        echo "Error: '$filename' not found in the include path.\n";
    }

    // Attempt to include a non-existing file to demonstrate error handling
    $missingFile = 'missing_file.txt';
    if (file_exists($missingFile)) {
        include $missingFile;
    } else {
        echo "Warning: '$missingFile' does not exist.\n";
    }
}

// Execute the function
includeFileExample();
?>