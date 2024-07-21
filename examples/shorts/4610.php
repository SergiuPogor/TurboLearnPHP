<?php

// Example: Implementing PHP File Locking
$file = 'data.txt';

// Open the file in write mode
$handle = fopen($file, 'a+');

// Check if file is successfully opened
if ($handle === false) {
    die('Unable to open file');
}

// Attempt to acquire an exclusive lock
if (flock($handle, LOCK_EX)) {
    // Write data to the file
    fwrite($handle, 'Data to be written');

    // Release the lock
    flock($handle, LOCK_UN);
} else {
    // Handle lock acquisition failure
    echo "Couldn't get the lock!";
}

// Close the file handle
fclose($handle);