<?php
// Detect the HTTP input character encoding
$encoding = mb_http_input();

// Check if the encoding was detected correctly
if ($encoding === false) {
    echo "Failed to detect encoding.";
} else {
    echo "Detected encoding: $encoding";
}

// Simulate a form submission with different encoding
$_POST['data'] = mb_convert_encoding("こんにちは", "SJIS", "UTF-8");

// Detect the encoding of POST data
$postEncoding = mb_http_input("P");
if ($postEncoding !== false) {
    // Convert POST data to UTF-8 if needed
    if ($postEncoding !== 'UTF-8') {
        $_POST['data'] = mb_convert_encoding($_POST['data'], "UTF-8", $postEncoding);
    }
    echo "Processed POST data: " . $_POST['data']; // Should output: こんにちは
} else {
    echo "Failed to detect POST encoding.";
}
?>