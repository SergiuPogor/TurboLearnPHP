<?php
// Start output buffering
ob_start();

// Output some content
echo "This content will be captured and cleared.";

// Get and clean the buffer contents
$content = ob_get_clean(); // Retrieves and clears the buffer

// Example of using file input
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content: " . $fileContent;
}

// Use the captured content for further processing
echo "Captured content: " . htmlspecialchars($content);
?>