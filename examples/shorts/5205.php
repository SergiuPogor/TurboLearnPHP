<?php
// Start output buffering
ob_start();

// Output some content
echo "This content will be flushed to the browser.";

// Get and flush the buffer contents
$content = ob_get_flush(); // Retrieves and clears the buffer

// Further operations can continue here
echo "Buffer has been flushed and cleared.";

// Example of using file input
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content: " . $fileContent;
}
?>