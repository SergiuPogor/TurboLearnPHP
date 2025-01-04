<?php

// Ensure the PHP environment has the DateTime class available
if (!class_exists('DateTime')) {
    die('DateTime class not available in this environment.');
}

// Create a new DateTime object for the current date and time
$dateTimeNow = new DateTime();

// Convert DateTime to timestamp using date_timestamp_get
$timestampNow = date_timestamp_get($dateTimeNow);

// Display the current timestamp
echo "Current Timestamp: " . $timestampNow . "\n";

// Function to demonstrate converting various DateTime objects to timestamps
function convertDateTimeToTimestamp($dateTimeString) {
    $dateTime = new DateTime($dateTimeString);
    return date_timestamp_get($dateTime);
}

// Example usage of the conversion function
$dateTimeExample1 = "2023-12-25 00:00:00"; // Christmas Day
$dateTimeExample2 = "2024-01-01 00:00:00"; // New Year's Day

$timestamp1 = convertDateTimeToTimestamp($dateTimeExample1);
$timestamp2 = convertDateTimeToTimestamp($dateTimeExample2);

// Display converted timestamps
echo "Timestamp for Christmas: " . $timestamp1 . "\n";
echo "Timestamp for New Year's: " . $timestamp2 . "\n";

// Function to demonstrate handling time zones
function convertDateTimeWithTimeZone($dateTimeString, $timeZone) {
    $dateTime = new DateTime($dateTimeString, new DateTimeZone($timeZone));
    return date_timestamp_get($dateTime);
}

// Example of converting with time zone consideration
$timestampWithTimeZone = convertDateTimeWithTimeZone("2024-06-15 15:30:00", "America/New_York");

// Display timestamp considering time zone
echo "Timestamp for June 15 in New York: " . $timestampWithTimeZone . "\n";

?>