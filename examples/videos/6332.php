<?php

// This PHP script demonstrates how to use inflate_init() 
// to decompress data that has been compressed using zlib.

// Example compressed data (a simple string)
$originalData = "This is the original data that needs to be compressed.";
$compressedData = gzcompress($originalData); // Compressing the original data

// Check the length of compressed data
echo "Length of Compressed Data: " . strlen($compressedData) . "\n";

// Initialize the inflate stream
$inflateStream = inflate_init();

// Decompress the data using the inflate stream
$decompressedData = inflate_add($inflateStream, $compressedData);

// Ensure all data is processed
$decompressedData .= inflate_add($inflateStream, '', ZLIB_FINISH);

// Check if decompression was successful
if ($decompressedData === $originalData) {
    echo "Decompression successful!\n";
    echo "Decompressed Data: " . $decompressedData . "\n";
} else {
    echo "Decompression failed!\n";
}

// Example of handling multiple compressed data streams
$dataStreams = [
    "This is the first stream." => gzcompress("This is the first stream."),
    "This is the second stream." => gzcompress("This is the second stream."),
    "This is the third stream." => gzcompress("This is the third stream."),
];

foreach ($dataStreams as $label => $compressed) {
    $inflateStream = inflate_init();
    $decompressed = inflate_add($inflateStream, $compressed);
    $decompressed .= inflate_add($inflateStream, '', ZLIB_FINISH);
    
    echo "$label: " . ($decompressed === $label ? "Decompression successful!" : "Failed") . "\n";
    echo "Decompressed: $decompressed\n";
}

// Function to manage the decompression of incoming compressed data
function manageDecompression($compressedData) {
    $inflateStream = inflate_init();
    $decompressed = inflate_add($inflateStream, $compressedData);
    return inflate_add($inflateStream, '', ZLIB_FINISH);
}

// Simulate receiving a compressed message
$receivedData = gzcompress("Received and compressed message!");
$decompressedReceived = manageDecompression($receivedData);
echo "Decompressed Received Data: $decompressedReceived\n";

?>