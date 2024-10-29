<?php
$file_path = '/tmp/test/sample.txt';

// Check if the file is writable
if (is_writable($file_path)) {
    // Write data to the file
    file_put_contents($file_path, "This is a test content.\n", FILE_APPEND);
} else {
    // If not writable, try to set permissions
    chmod($file_path, 0666); // Set permissions to read and write for everyone

    // Recheck if writable after changing permissions
    if (is_writable($file_path)) {
        file_put_contents($file_path, "This is a test content.\n", FILE_APPEND);
    } else {
        echo "Error: Unable to write to the file.";
    }
}