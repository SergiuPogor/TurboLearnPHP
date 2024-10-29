<?php
// Example showing how to use fread() to manage memory with large files

// Open the large file for reading
$largeFile = fopen('/tmp/test/large_file.txt', 'rb');
if (!$largeFile) {
    die("Failed to open the file for reading.\n");
}

// Define the size of each chunk to read
$chunkSize = 8192; // 8 KB

// Read the file in chunks
while (!feof($largeFile)) {
    // Read a chunk of data
    $chunk = fread($largeFile, $chunkSize);
    
    // Process the chunk
    // Here you can perform your logic, such as parsing or transforming the data
    echo $chunk; // Example: Outputting the chunk (not recommended for large data)
}

// Close the file
fclose($largeFile);

// Open a binary file in chunks
$binaryFile = fopen('/tmp/test/input.zip', 'rb');
if (!$binaryFile) {
    die("Failed to open the binary file.\n");
}

// Read the binary file in chunks
while (!feof($binaryFile)) {
    $binaryChunk = fread($binaryFile, $chunkSize);
    // Perform operations on the binary data here
}

// Close the binary file
fclose($binaryFile);