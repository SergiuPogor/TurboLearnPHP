<?php
// Get the current script's file name and path
$currentFile = __FILE__; // Retrieves the full path and file name
$fileName = basename($currentFile); // Extracts the file name from the full path

// Log the information (this could be useful for debugging)
error_log("Current script file name: " . $fileName);
error_log("Full script path: " . $currentFile);

// Example function to demonstrate usage
function displayFileName() {
    // Displaying the current file name to the user
    echo "You are currently running the script: " . basename(__FILE__);
}

displayFileName();
?>