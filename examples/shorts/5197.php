<?php
// Path to the file you want to check
$file_path = '/tmp/test/input.txt';

// Get the MIME type of the file
$mime_type = mime_content_type($file_path);

// Output the MIME type
echo "The MIME type of the file is: " . $mime_type;
?>