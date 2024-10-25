<?php

// Example demonstrating how to include a PHP file with error handling

// Define the path to the file you want to include
$fileToInclude = __DIR__ . '/includes/config.php'; // Use absolute path

// Step 1: Check if the file exists before including it
if (file_exists($fileToInclude)) {
    // Step 2: Attempt to include the file
    include $fileToInclude;
} else {
    // Step 3: Handle the error gracefully
    error_log("File not found: $fileToInclude"); // Log the error
    echo "Error: Unable to include the configuration file. Please check the path.";
}

// Additional example using require_once
$fileToRequire = __DIR__ . '/includes/functions.php';

if (file_exists($fileToRequire)) {
    require_once $fileToRequire; // Include and prevent multiple inclusions
} else {
    // Handle the error for require_once
    error_log("Required file missing: $fileToRequire");
    die("Critical error: Functions file is required. Exiting...");
}

// Further processing
// Using a function from the included file
if (function_exists('initializeApp')) {
    initializeApp(); // Call a function defined in the included file
} else {
    echo "Initialization function not found.";
}