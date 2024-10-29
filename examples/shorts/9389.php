<?php

// Sample function demonstrating try-catch for file operations

function readFileContent($filename) {
    try {
        // Attempt to open the file
        if (!file_exists($filename)) {
            throw new Exception("File not found: " . $filename);
        }
        
        $content = file_get_contents($filename);
        
        // Return the content of the file
        return $content;
        
    } catch (Exception $e) {
        // Handle the exception by logging the error
        error_log($e->getMessage());
        return "An error occurred while reading the file.";
    }
}

// Example of using the function
$filename = '/tmp/test/input.txt';
$result = readFileContent($filename);
echo $result;