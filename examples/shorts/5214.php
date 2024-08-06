<?php
// Start output buffering
ob_start();
echo "Initial buffer content.\n";

// Add a rewrite variable to the output
output_add_rewrite_var('key', 'value');

// Simulate dynamic content and URL
echo "Content with key-value rewrite variable.\n";

// Fetch buffer content and clean up
$content = ob_get_clean();
echo "Final output: " . $content;

// Example of handling file input
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content: " . $fileContent;
} else {
    echo "File not found.";
}
?>