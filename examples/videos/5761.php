<?php
// This script demonstrates how to use hash_file() in PHP
// to verify file integrity by generating a hash.

function verify_file_integrity($filePath, $expectedHash, $algo = 'sha256') {
    // Check if the file exists
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }

    // Generate the file hash
    $fileHash = hash_file($algo, $filePath);

    // Compare the generated hash with the expected hash
    if ($fileHash === $expectedHash) {
        echo "File integrity verified. Hash matches.\n";
    } else {
        echo "File integrity check failed. Hash does not match!\n";
    }
}

// Example Usage
try {
    // Define file path and expected hash
    $filePath = '/tmp/test/input.txt'; // Example file
    $expectedHash = 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'; // Replace with actual expected hash

    verify_file_integrity($filePath, $expectedHash);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>