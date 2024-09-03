<?php

// Function to demonstrate the use of iconv_mime_decode_headers()
function demonstrateIconvMimeDecodeHeaders() {
    // Sample encoded email headers
    $headers = [
        'From' => '=?UTF-8?B?Sm9obiBEb2U=?= <john.doe@example.com>',
        'Subject' => '=?ISO-8859-1?Q?Hello_World?='
    ];
    
    // Decode the headers
    $decodedHeaders = iconv_mime_decode_headers($headers, 0, 'UTF-8');
    
    // Display decoded headers
    echo "Decoded Headers:\n";
    foreach ($decodedHeaders as $header => $value) {
        echo "$header: $value\n";
    }
}

// Example usage
demonstrateIconvMimeDecodeHeaders();

// Advanced example: Handling a full email header
function handleFullEmailHeader($rawHeader) {
    // Decode the full raw email header
    $decodedHeaders = iconv_mime_decode_headers($rawHeader, 0, 'UTF-8');
    
    // Display decoded headers
    echo "Full Email Header Decoding:\n";
    foreach ($decodedHeaders as $header => $value) {
        echo "$header: $value\n";
    }
}

// Example usage with a raw email header
$rawHeader = [
    'From' => '=?ISO-8859-1?Q?Alice_=C4=8C=E1?= <alice@example.com>',
    'To' => '=?UTF-8?B?Qm9iIFNtaXRo?= <bob.smith@example.com>',
    'Subject' => '=?UTF-8?B?U29tZSBub3RpZmljYXRpb24=?='
];
handleFullEmailHeader($rawHeader);
?>