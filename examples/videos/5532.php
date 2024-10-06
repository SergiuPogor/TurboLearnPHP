<?php

// Define the input file and output file paths
$inputFile = '/tmp/test/input.txt';
$outputFile = '/tmp/test/compressed_output.txt';

// Check if the input file exists
if (!file_exists($inputFile)) {
    die("Input file not found!");
}

// Read data from the input file
$data = file_get_contents($inputFile);

// Use zlib_encode to compress the data
$compressedData = zlib_encode($data, ZLIB_ENCODING_DEFLATE);

// Save the compressed data to the output file
file_put_contents($outputFile, $compressedData);

// Function to decompress data using zlib_decode
function decompressData($compressedData) {
    return zlib_decode($compressedData);
}

// Example of decompression
$decompressedData = decompressData($compressedData);

// Display the original and decompressed data lengths
echo "Original Data Length: " . strlen($data) . " bytes\n";
echo "Compressed Data Length: " . strlen($compressedData) . " bytes\n";
echo "Decompressed Data Length: " . strlen($decompressedData) . " bytes\n";

// Example using multiple encoding levels
$levels = [ZLIB_ENCODING_DEFLATE, ZLIB_ENCODING_GZIP];

foreach ($levels as $level) {
    $encodedData = zlib_encode($data, $level);
    echo "Data Length with Encoding Level {$level}: " . strlen($encodedData) . " bytes\n";
}

// Error handling example
try {
    // Attempt to compress with invalid data
    $invalidData = null; // This should trigger an error
    zlib_encode($invalidData, ZLIB_ENCODING_DEFLATE);
} catch (Exception $e) {
    echo "Error occurred: " . $e->getMessage();
}

?>