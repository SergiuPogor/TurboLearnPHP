<?php
session_start();

// Function to check rate limit
function checkRateLimit($limit, $timeFrame) {
    $currentTime = time();
    if (!isset($_SESSION['requests'])) {
        $_SESSION['requests'] = [];
    }

    // Remove requests older than the time frame
    $_SESSION['requests'] = array_filter($_SESSION['requests'], function ($timestamp) use ($currentTime, $timeFrame) {
        return ($timestamp > ($currentTime - $timeFrame));
    });

    // Check if limit is reached
    if (count($_SESSION['requests']) < $limit) {
        // Log the current request timestamp
        $_SESSION['requests'][] = $currentTime;
        return true; // Request allowed
    }

    return false; // Rate limit exceeded
}

// Example usage
$limit = 5; // Allow 5 requests
$timeFrame = 60; // Within 60 seconds

if (checkRateLimit($limit, $timeFrame)) {
    // Process the request
    echo "Request successful!";
} else {
    // Rate limit exceeded
    http_response_code(429);
    echo "Rate limit exceeded. Try again later.";
}