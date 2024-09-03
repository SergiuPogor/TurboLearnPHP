<?php

// Example data to compress
$data = "This is a sample string that will be compressed using gzcompress. " .
        "It contains a lot of repetitive text to demonstrate how gzcompress can reduce its size.";

// Compress the data using gzcompress
$compressedData = gzcompress($data, 9);

if ($compressedData === false) {
    die("Compression failed.");
}

// Save the compressed data to a file
file_put_contents('/tmp/test/compressed_data.gz', $compressedData);

// Read the compressed data from the file
$compressedDataFromFile = file_get_contents('/tmp/test/compressed_data.gz');

// Decompress the data using gzuncompress
$decompressedData = gzuncompress($compressedDataFromFile);

if ($decompressedData === false) {
    die("Decompression failed.");
}

echo "Original Data Length: " . strlen($data) . "\n";
echo "Compressed Data Length: " . strlen($compressedData) . "\n";
echo "Decompressed Data: " . $decompressedData . "\n";

?>