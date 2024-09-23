<?php

// Function to demonstrate use of inflate_add() for streaming decompression
function decompressStream($compressedData) {
    $inflater = zlib_init(ZLIB_ENCODING_DEFLATE);
    $bufferSize = 4096; // Size of buffer for reading and writing data
    $output = '';
    $compressedDataLength = strlen($compressedData);
    
    for ($offset = 0; $offset < $compressedDataLength; $offset += $bufferSize) {
        $chunk = substr($compressedData, $offset, $bufferSize);
        $output .= zlib_inflate_add($inflater, $chunk);
    }

    // Finalize decompression
    $output .= zlib_inflate_add($inflater, '', ZLIB_FINISH);
    
    zlib_end($inflater);
    return $output;
}

// Example usage
$compressedData = file_get_contents('/tmp/test/input.zip'); // Read compressed data from a file
$decompressedData = decompressStream($compressedData);
file_put_contents('/tmp/test/output.txt', $decompressedData); // Save decompressed data

?>