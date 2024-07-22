<?php
// Example demonstrating correct time zone handling in PHP DateTime

// Set the default time zone to avoid issues
date_default_timezone_set('America/New_York');

// Create a DateTime object
$datetime = new DateTime('now');

// Display the current date and time
echo 'Current DateTime: ' . $datetime->format('Y-m-d H:i:s');

// Function to create a DateTime object with a specific time zone
function createDateTimeInTimezone(string $timezone): DateTime {
    $datetime = new DateTime('now', new DateTimeZone($timezone));
    return $datetime;
}

// Example usage
$datetime = createDateTimeInTimezone('Europe/London');
echo 'DateTime in London: ' . $datetime->format('Y-m-d H:i:s');
?>