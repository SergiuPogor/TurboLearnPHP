<?php
// Start an output buffer
ob_start();
echo "Buffer content";

// Get the current output buffer status
$status = ob_get_status();
print_r($status);

// End the output buffer
ob_end_clean();

// Example of handling file input and output
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content length: " . strlen($fileContent);
}
?>