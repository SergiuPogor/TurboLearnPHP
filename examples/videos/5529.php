<?php

// Initialize CURL
$ch = curl_init();

// Set CURL options
curl_setopt($ch, CURLOPT_URL, "http://example.com/nonexistent");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute CURL request
$response = curl_exec($ch);

// Check for CURL errors
if ($response === false) {
    $error = curl_error($ch);
    echo "CURL Error: " . $error . "\n";
} else {
    echo "CURL Request Successful\n";
}

// Close CURL session
curl_close($ch);

// Example with valid URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://example.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if ($response === false) {
    $error = curl_error($ch);
    echo "CURL Error: " . $error . "\n";
} else {
    echo "CURL Request Successful\n";
}

curl_close($ch);

?>