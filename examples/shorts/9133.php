<?php

// Example of using parse_url() for validating URLs
$urls = [
    "https://www.example.com/path?query=1",
    "invalid-url",
    "ftp://ftp.example.com/file.txt",
    "http://localhost:8080"
];

// Function to validate URLs using parse_url()
function validateUrls(array $urls) {
    foreach ($urls as $url) {
        $parsedUrl = parse_url($url);
        if (isset($parsedUrl['scheme']) && isset($parsedUrl['host'])) {
            echo "Valid URL: $url\n";
        } else {
            echo "Invalid URL: $url\n";
        }
    }
}

// Run the validation function
validateUrls($urls);

// Example of extracting the scheme and host
$validUrl = "https://www.example.com/path?query=1";
$parsed = parse_url($validUrl);
$scheme = $parsed['scheme']; // 'https'
$host = $parsed['host']; // 'www.example.com'

// Display the extracted components
echo "Scheme: $scheme\n";
echo "Host: $host\n";

?>