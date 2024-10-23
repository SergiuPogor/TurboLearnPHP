<?php

// Step 1: Function to demonstrate gzuncompress usage
function decompressData($compressedData) {
    // Step 2: Attempt to uncompress the data
    $uncompressedData = gzuncompress($compressedData);

    // Step 3: Check if the uncompression was successful
    if ($uncompressedData === false) {
        throw new Exception("Failed to uncompress the data.");
    }

    return $uncompressedData;
}

// Step 4: Sample compressed data
$originalData = "This is a test string to be compressed.";
$compressedData = gzcompress($originalData);

// Step 5: Display the compressed data
echo "Compressed Data: " . base64_encode($compressedData) . "\n";

// Step 6: Attempt to uncompress the data
try {
    $result = decompressData($compressedData);
    echo "Uncompressed Data: " . $result . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Step 7: Using gzuncompress with different scenarios
$exampleData = gzcompress("Example data to demonstrate gzuncompress.");
try {
    // Uncompress the example data
    $uncompressedExample = decompressData($exampleData);
    echo "Example Uncompressed Data: " . $uncompressedExample . "\n";
} catch (Exception $e) {
    echo "Error in example: " . $e->getMessage() . "\n";
}

// Step 8: Show how to handle false returns
$badCompressedData = "This is not compressed data.";
try {
    $result = decompressData($badCompressedData);
} catch (Exception $e) {
    echo "Caught an error: " . $e->getMessage() . "\n";
}

?>