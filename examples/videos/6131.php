<?php
// Set the default timezone
date_default_timezone_set('America/New_York');

// Create a DateTime object for a specific date
$dateTime = new DateTime('2023-10-22 14:00:00');

// Display the original date
echo "Original Date: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// Get the timezone of the DateTime object
$timezone = $dateTime->getTimezone();

// Get the UTC offset in seconds
$offsetSeconds = date_offset_get($dateTime);

// Convert the offset to hours and minutes
$offsetHours = floor($offsetSeconds / 3600);
$offsetMinutes = abs(($offsetSeconds % 3600) / 60);

// Display the UTC offset
echo "UTC Offset: " . sprintf("%+03d:%02d", $offsetHours, $offsetMinutes) . "\n";

// Create a DateTime object for another timezone
$dateTimeLondon = new DateTime('2023-10-22 14:00:00', new DateTimeZone('Europe/London'));

// Display the original London date
echo "London Date: " . $dateTimeLondon->format('Y-m-d H:i:s') . "\n";

// Get the UTC offset for London
$offsetLondon = date_offset_get($dateTimeLondon);
$offsetLondonHours = floor($offsetLondon / 3600);
$offsetLondonMinutes = abs(($offsetLondon % 3600) / 60);

// Display the UTC offset for London
echo "London UTC Offset: " . sprintf("%+03d:%02d", $offsetLondonHours, $offsetLondonMinutes) . "\n";

// Example of calculating the difference between two time zones
$timeDifference = $offsetHours - $offsetLondonHours;
echo "Time Difference between New York and London: " . $timeDifference . " hours\n";
?>