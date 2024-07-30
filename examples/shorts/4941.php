<?php

function copyDirectory($source, $destination)
{
    // Check if source is a directory
    if (is_dir($source)) {
        // Create destination directory if it doesn't exist
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        // Get files and directories in source directory
        $files = scandir($source);

        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }

            // Recursively copy directories
            copyDirectory("$source/$file", "$destination/$file");
        }
    } else {
        // Open source and destination files as streams
        $sourceStream = fopen($source, 'rb');
        $destStream = fopen($destination, 'wb');

        // Copy file content from source to destination using stream_copy_to_stream
        stream_copy_to_stream($sourceStream, $destStream);

        // Close the streams
        fclose($sourceStream);
        fclose($destStream);
    }
}

// Example usage
$sourceDir = '/path/to/source';
$destDir = '/path/to/destination';

try {
    copyDirectory($sourceDir, $destDir);
    echo "Directory copied successfully!";
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}

?>