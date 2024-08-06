<?php
// Initialize the finfo resource for MIME type detection
$finfo = finfo_open(FILEINFO_MIME_TYPE);

// Example data as a string (could be from file upload or other sources)
$data = file_get_contents('/tmp/test/input.zip');

// Get the MIME type of the data buffer
$mime_type = finfo_buffer($finfo, $data);

// Close the finfo resource
finfo_close($finfo);

// Output the MIME type
echo "The MIME type of the data buffer is: " . $mime_type;
?>