<?php
// Initialize the finfo resource for MIME type detection
$finfo = finfo_open(FILEINFO_MIME_TYPE);

// Define the path to the file
$file_path = '/tmp/test/input.txt';

// Get the MIME type of the file
$mime_type = finfo_file($finfo, $file_path);

// Close the finfo resource
finfo_close($finfo);

// Output the MIME type
echo "The MIME type of the file is: " . $mime_type;
?>