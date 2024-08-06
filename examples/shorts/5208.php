<?php
// Start output buffering
ob_start();
echo "Buffer level 1";

// Start another buffer
ob_start();
echo "Buffer level 2";

// Check the number of active buffers
$level = ob_get_level();
echo "Current buffer level: " . $level;

// End the top buffer (Buffer level 2)
ob_end_clean();

// Check buffer level again
$level = ob_get_level();
echo "New buffer level: " . $level;

// End the remaining buffer (Buffer level 1)
ob_end_clean();

// Example of file handling
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content: " . htmlspecialchars($fileContent);
}
?>