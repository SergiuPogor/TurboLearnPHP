<?php

// Example: Using date_timezone_get() to retrieve timezone information

// Creating a DateTime object with a specific time zone
$dateTime = new DateTime('2024-10-21 14:00:00', new DateTimeZone('America/New_York'));

// Retrieve the timezone information
$timezone = date_timezone_get($dateTime);

// Output the timezone name
echo "Timezone: " . $timezone->getName() . "\n";

// Example: Handling multiple time zones
$timezones = ['America/New_York', 'Europe/London', 'Asia/Tokyo'];

foreach ($timezones as $tz) {
    $dateTime = new DateTime('now', new DateTimeZone($tz));
    $timezone = date_timezone_get($dateTime);
    
    // Output the current time in different time zones
    echo "Current time in " . $timezone->getName() . ": " . $dateTime->format('Y-m-d H:i:s') . "\n";
}

// Example: User preference for timezone
$userTimezone = 'Europe/Berlin'; // Assume this is fetched from user settings
$dateTime = new DateTime('2024-10-21 14:00:00', new DateTimeZone($userTimezone));
$timezone = date_timezone_get($dateTime);

// Output time in user’s timezone
echo "User's local time: " . $dateTime->format('Y-m-d H:i:s') . "\n";
?>