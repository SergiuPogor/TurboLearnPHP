<?php

// Example to demonstrate timezone_open() function

// Define the timezone string
$timezoneString = 'America/New_York';

// Create a DateTimeZone object using timezone_open()
$timezone = timezone_open($timezoneString);

// Check if the timezone is valid
if ($timezone === false) {
    die("Invalid timezone provided.");
}

// Create a DateTime object in the specified timezone
$date = new DateTime('now', $timezone);

// Display the current time in the specified timezone
echo "Current time in {$timezoneString}: " . $date->format('Y-m-d H:i:s') . "\n";

// Change the timezone to a different one
$timezoneString2 = 'Europe/London';
$timezone2 = timezone_open($timezoneString2);
$date->setTimezone($timezone2);

// Display the current time in the new timezone
echo "Current time in {$timezoneString2}: " . $date->format('Y-m-d H:i:s') . "\n";

// Create an array of different timezones
$timezones = [
    'Asia/Tokyo',
    'Australia/Sydney',
    'Africa/Johannesburg'
];

// Loop through the timezones and display the current time
foreach ($timezones as $tz) {
    $timezone = timezone_open($tz);
    $date->setTimezone($timezone);
    echo "Current time in {$tz}: " . $date->format('Y-m-d H:i:s') . "\n";
}
?>