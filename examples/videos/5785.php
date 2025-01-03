<?php

// Function to demonstrate the usage of gzdecode
function decompressGzipData($compressedData)
{
    // Decompress the data using gzdecode
    $decompressedData = gzdecode($compressedData);
    
    // Check if decompression was successful
    if ($decompressedData === false) {
        throw new Exception("Decompression failed!");
    }

    return $decompressedData;
}

// Example function to fetch and decode API response
function fetchAndDecodeApiResponse($url)
{
    // Fetch the compressed response from the API
    $response = file_get_contents($url);

    // If the response is gzip compressed, decode it
    if (substr($response, 0, 3) === "\x1F\x8B\x08") { // Check for gzip magic number
        return decompressGzipData($response);
    }

    return $response; // Return as-is if not compressed
}

// Example usage
try {
    $url = "https://api.example.com/data"; // Example API URL
    $decodedData = fetchAndDecodeApiResponse($url);
    
    // Display the decoded data
    echo "Decoded Data: " . $decodedData . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>