<?php

// Example demonstrating curl_share_strerror() function

// Initialize cURL session
$ch = curl_init();

// Set the URL for the cURL request
curl_setopt($ch, CURLOPT_URL, 'https://api.example.com/data');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    $errorCode = curl_errno($ch);
    $errorMessage = curl_share_strerror($errorCode);
    echo "cURL Error ({$errorCode}): {$errorMessage}\n";
} else {
    // Process the successful response
    echo "Response: {$response}\n";
}

// Close the cURL session
curl_close($ch);

// Example using curl_share_init to demonstrate sharing cURL handles

// Initialize cURL share object
$share = curl_share_init();

// Set share options
curl_share_setopt($share, CURLSHOPT_SHARE, CURL_LOCK_DATA_COOKIE);
curl_share_setopt($share, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);

// Initialize another cURL session
$ch2 = curl_init();

// Set URL and share the handle
curl_setopt($ch2, CURLOPT_URL, 'https://api.example.com/anotherdata');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_SHARE, $share);

// Execute the second cURL request
$response2 = curl_exec($ch2);

// Check for errors in the second request
if ($response2 === false) {
    $errorCode2 = curl_errno($ch2);
    $errorMessage2 = curl_share_strerror($errorCode2);
    echo "cURL Error ({$errorCode2}): {$errorMessage2}\n";
} else {
    echo "Response from second request: {$response2}\n";
}

// Close the second cURL session and share
curl_close($ch2);
curl_share_close($share);
?>