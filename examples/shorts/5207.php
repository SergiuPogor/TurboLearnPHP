<?php
// Start output buffering
ob_start();

// Output some content
echo "This content will be captured by ob_get_contents().";

// Retrieve the contents of the output buffer
$content = ob_get_contents(); // Gets the buffer content without cleaning it

// Process the captured content (e.g., log it or modify it)
file_put_contents('/tmp/test/log.txt', $content);

// Flush and clean the output buffer
ob_end_flush();

// Example of reading a file from the /tmp/test directory
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content: " . htmlspecialchars($fileContent);
}
?>