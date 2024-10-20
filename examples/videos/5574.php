<?php

// Example: Using zip_entry_compressionmethod() to check compression methods in a zip file

// Create a new zip archive
$zip = new ZipArchive();
$zipFilePath = '/tmp/test/sample.zip';

// Open the zip archive for creation
if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
    // Add files to the zip
    $zip->addFile('/tmp/test/input.txt', 'input.txt');

    // Set compression level and method for the added file
    $zip->setCompressionName('input.txt', ZipArchive::CM_DEFLATE); // Using DEFLATE method

    // Close the zip archive
    $zip->close();
}

// Reopen the zip archive to read compression methods
if ($zip->open($zipFilePath) === TRUE) {
    // Loop through the files in the zip
    for ($i = 0; $i < $zip->numFiles; $i++) {
        $entryName = $zip->getNameIndex($i);
        $compressionMethod = $zip->getCompressionIndex($i);

        // Output the file name and its compression method
        echo "File: $entryName | Compression Method: $compressionMethod" . PHP_EOL;
    }

    // Close the zip archive
    $zip->close();
} else {
    echo "Failed to open the zip file." . PHP_EOL;
}

?>