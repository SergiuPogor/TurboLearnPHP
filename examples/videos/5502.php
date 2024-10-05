<?php

// File paths
$inputFile = '/tmp/test/input.txt';

// Function to check if a file is empty or contains only whitespace
function isFileEmptyOrWhitespace($filePath) {
    // Check if file exists
    if (!file_exists($filePath)) {
        throw new Exception('File does not exist.');
    }
    
    // Get file content
    $content = file_get_contents($filePath);
    
    // Check if content is empty or consists only of whitespace
    return ctype_space($content) || trim($content) === '';
}

// Example usage
try {
    if (isFileEmptyOrWhitespace($inputFile)) {
        echo "The file is either empty or contains only whitespace.";
    } else {
        echo "The file contains meaningful content.";
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

// Another example: Filter user input
$userInput = " \t\n  ";
if (ctype_space($userInput)) {
    echo "Input contains only whitespace.";
} else {
    echo "Input has non-whitespace characters.";
}

// Advanced example: Validate multiple files
$files = [
    '/tmp/test/input1.txt',
    '/tmp/test/input2.txt'
];

foreach ($files as $file) {
    try {
        if (isFileEmptyOrWhitespace($file)) {
            echo "File $file is either empty or contains only whitespace.\n";
        } else {
            echo "File $file contains meaningful content.\n";
        }
    } catch (Exception $e) {
        echo 'Error with file ' . $file . ': ' . $e->getMessage() . "\n";
    }
}
?>
