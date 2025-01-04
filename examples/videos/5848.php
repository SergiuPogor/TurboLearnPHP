<?php
// Example of using timezone_identifiers_list() in PHP
// Get all time zone identifiers
$timeZones = timezone_identifiers_list();

// Display time zones
echo "Supported Time Zones:\n";
foreach ($timeZones as $timezone) {
    echo "$timezone\n";
}

// Example of setting the default timezone
date_default_timezone_set('America/New_York');
echo "Current time in New York: " . date('Y-m-d H:i:s') . "\n";

// Example of listing time zones with a specific region
$regions = timezone_identifiers_list(DateTimeZone::ALL);
$usTimeZones = array_filter($regions, function($zone) {
    return strpos($zone, 'America/') === 0;
});
echo "\nAmerican Time Zones:\n";
foreach ($usTimeZones as $timezone) {
    echo "$timezone\n";
}

// Handling user input for time zones
$userTimezone = 'Europe/London';
if (in_array($userTimezone, $timeZones)) {
    date_default_timezone_set($userTimezone);
    echo "Current time in London: " . date('Y-m-d H:i:s') . "\n";
} else {
    echo "Invalid timezone specified.\n";
}

// Example of converting time between two time zones
$date = new DateTime("now", new DateTimeZone('America/New_York'));
$date->setTimezone(new DateTimeZone('Europe/London'));
echo "Converted time from New York to London: " . $date->format('Y-m-d H:i:s') . "\n";
?>