<?php
// Initialize the finfo resource with MIME_TYPE
$finfo = finfo_open(FILEINFO_MIME_TYPE);

// Set additional flags for more specific detection
finfo_set_flags($finfo, FILEINFO_MIME | FILEINFO_SYMLINK);

// Define the path to the file
$file_path = '/tmp/test/input.zip';

// Get the MIME type of the file with custom flags
$mime_type = finfo_file($finfo, $file_path);

// Close the finfo resource
finfo_close($finfo);

// Output the MIME type
echo "The MIME type of the file with custom flags is: " . $mime_type;
?>