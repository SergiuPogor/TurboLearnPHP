<?php
// Setting timezone and demonstrating date functions in PHP

// Set default timezone
date_default_timezone_set('America/New_York');

// Get current date and time
$currentDate = date('Y-m-d H:i:s');
echo "Current Date and Time: $currentDate\n";

// Using DateTime for consistent timezone handling
$dateTime = new DateTime('now', new DateTimeZone('America/Los_Angeles'));
echo "DateTime in Los Angeles: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// Change timezone of DateTime object
$dateTime->setTimezone(new DateTimeZone('UTC'));
echo "DateTime in UTC: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// Example of a timestamp
$timestamp = time();
echo "Current Unix Timestamp: $timestamp\n";

// Formatting a timestamp
$formattedDate = date('Y-m-d H:i:s', $timestamp);
echo "Formatted Date from Timestamp: $formattedDate\n";

// Test different timezone outputs
function displayTimeInDifferentZones($zones) {
    foreach ($zones as $zone) {
        $dateTime = new DateTime('now', new DateTimeZone($zone));
        echo "Current time in $zone: " . $dateTime->format('Y-m-d H:i:s') . "\n";
    }
}

// Display time in various timezones
$timezones = ['Europe/London', 'Asia/Tokyo', 'Australia/Sydney'];
displayTimeInDifferentZones($timezones);