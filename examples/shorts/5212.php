<?php
// Enable automatic output flushing
ob_implicit_flush(true);

// Output content and flush immediately
echo "Real-time data output starts now...";
sleep(2); // Simulate delay
echo " Data continues to arrive.";
sleep(2); // Simulate delay
echo " End of data.\n";

// Example of handling file input
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $fileContent = file_get_contents($file);
    echo "File content: " . $fileContent;
} else {
    echo "File not found.";
}
?>