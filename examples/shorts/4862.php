<?php
// Fixing timezone issues with PHP DateTime

// Set the default timezone to avoid incorrect handling
date_default_timezone_set('UTC');

// Create DateTime object with specific timezone
$dateTime = new DateTime('now', new DateTimeZone('America/New_York'));

// Output the date and time with the set timezone
echo $dateTime->format('Y-m-d H:i:s'); // Outputs date and time in New York timezone

// Example of converting to another timezone
$dateTime->setTimezone(new DateTimeZone('Europe/London'));
echo $dateTime->format('Y-m-d H:i:s'); // Outputs date and time in London timezone
?>