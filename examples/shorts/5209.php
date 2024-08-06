<?php
// Start output buffering
ob_start();
echo "This is a test buffer";

// Get the length of the current output buffer
$bufferLength = ob_get_length();
echo "Current buffer length: " . $bufferLength;

// End the output buffer and clean up
ob_end_clean();

// Example of reading from a file
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content length: " . strlen($fileContent);
}
?>