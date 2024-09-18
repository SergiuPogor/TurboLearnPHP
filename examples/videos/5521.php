<?php

// Function to demonstrate use of finfo_open() for file type detection
function detectFileType($filePath) {
    // Create a Fileinfo resource with the MIME type detection
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    
    if ($finfo === false) {
        throw new RuntimeException('Unable to open Fileinfo resource.');
    }
    
    // Get the MIME type of the file
    $mimeType = finfo_file($finfo, $filePath);
    
    if ($mimeType === false) {
        finfo_close($finfo);
        throw new RuntimeException('Unable to determine MIME type.');
    }
    
    // Close the Fileinfo resource
    finfo_close($finfo);
    
    // Return the detected MIME type
    return $mimeType;
}

// Example usage
$filePath = '/tmp/test/input.txt'; // Path to the file to be checked
$mimeType = detectFileType($filePath);

// Output the MIME type
echo "The MIME type of the file is: $mimeType";

?>