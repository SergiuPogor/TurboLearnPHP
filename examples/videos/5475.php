<?php

// Basic usage of strtotime()
$timestamp = strtotime('2024-12-25 14:30:00');
echo "Basic timestamp: " . $timestamp . PHP_EOL;

// Advanced usage with relative date
$nextFriday = strtotime('next Friday');
echo "Next Friday timestamp: " . $nextFriday . PHP_EOL;

// Dealing with time zones: Changing the default timezone
date_default_timezone_set('America/New_York');
$newYorkTime = strtotime('2024-08-24 12:00:00');
echo "New York Time: " . date('Y-m-d H:i:s', $newYorkTime) . PHP_EOL;

// Setting a different timezone
date_default_timezone_set('Europe/London');
$londonTime = strtotime('2024-08-24 12:00:00');
echo "London Time: " . date('Y-m-d H:i:s', $londonTime) . PHP_EOL;

// Using strtotime() with time zone offset
$timestampWithOffset = strtotime('2024-08-24 12:00:00 +02:00');
echo "Time with offset: " . date('Y-m-d H:i:s', $timestampWithOffset) . PHP_EOL;

// Parsing date and time with different formats
$dateString1 = 'last Monday 5pm';
$dateString2 = '2024-12-31 23:59:59';
$timestamp1 = strtotime($dateString1);
$timestamp2 = strtotime($dateString2);
echo "Last Monday 5pm timestamp: " . $timestamp1 . PHP_EOL;
echo "End of year timestamp: " . $timestamp2 . PHP_EOL;

// Complex relative date strings
$complexDate = strtotime('+2 weeks 3 days 4 hours');
echo "Complex date calculation: " . date('Y-m-d H:i:s', $complexDate) . PHP_EOL;

// Handling strtotime() errors
$date = 'invalid date string';
$timestampError = strtotime($date);
if ($timestampError === false) {
    echo "Error: Unable to parse date string '{$date}'" . PHP_EOL;
}

// Demonstrating strtotime() with user input
$userDateInput = '2024-10-31 20:00:00';
$userTimezone = 'America/Los_Angeles';
date_default_timezone_set($userTimezone);
$parsedTimestamp = strtotime($userDateInput);
echo "User input date in {$userTimezone}: " . date('Y-m-d H:i:s', $parsedTimestamp) . PHP_EOL;

// Working with date differences
$date1 = strtotime('2024-01-01');
$date2 = strtotime('2024-12-31');
$dateDifference = $date2 - $date1;
echo "Difference in days: " . ($dateDifference / (60 * 60 * 24)) . " days" . PHP_EOL;

?>