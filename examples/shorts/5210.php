<?php
// Start multiple output buffers
ob_start();
echo "First buffer content";
ob_start();
echo "Second buffer content";

// List the current output buffer handlers
$handlers = ob_list_handlers();
print_r($handlers);

// End the output buffers and clean up
while (ob_get_level() > 0) {
    ob_end_clean();
}

// Example of file handling with buffer list
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content length: " . strlen($fileContent);
}
?>