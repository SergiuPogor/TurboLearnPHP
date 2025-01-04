<?php

// Example 1: Using localtime() to get current time components
$current_time = localtime(time(), true); // Get time components in an associative array

// Accessing individual components from the array
echo "Current Year: " . ($current_time['tm_year'] + 1900) . "\n"; // tm_year is the number of years since 1900
echo "Current Month: " . ($current_time['tm_mon'] + 1) . "\n"; // tm_mon is zero-indexed
echo "Current Day: " . $current_time['tm_mday'] . "\n"; // tm_mday is the day of the month
echo "Current Hour: " . $current_time['tm_hour'] . "\n";
echo "Current Minute: " . $current_time['tm_min'] . "\n";
echo "Current Second: " . $current_time['tm_sec'] . "\n";

// Example 2: Perform time-based calculations by modifying specific components
$current_time['tm_hour'] += 2; // Add 2 hours
$current_time['tm_min'] -= 30; // Subtract 30 minutes

// Convert back to Unix timestamp using mktime
$modified_timestamp = mktime(
    $current_time['tm_hour'],
    $current_time['tm_min'],
    $current_time['tm_sec'],
    $current_time['tm_mon'] + 1, // Months are 0-indexed
    $current_time['tm_mday'],
    $current_time['tm_year'] + 1900 // Years are calculated from 1900
);

echo "New timestamp after modification: $modified_timestamp\n";

// Example 3: Using localtime() with a specific timestamp
$specified_time = localtime(strtotime('2024-10-31 12:34:56'), true);

// Output specific date components from the given timestamp
echo "Year: " . ($specified_time['tm_year'] + 1900) . "\n"; // Year since 1900
echo "Month: " . ($specified_time['tm_mon'] + 1) . "\n"; // Zero-indexed month
echo "Day: " . $specified_time['tm_mday'] . "\n";
echo "Hour: " . $specified_time['tm_hour'] . "\n";
echo "Minute: " . $specified_time['tm_min'] . "\n";
echo "Second: " . $specified_time['tm_sec'] . "\n";

// Example 4: Using localtime() in an advanced scenario to create a countdown timer
$event_time = localtime(strtotime('2024-12-25 00:00:00'), true); // Christmas 2024
$remaining_seconds = strtotime('2024-12-25 00:00:00') - time(); // Calculate seconds remaining

// Convert remaining seconds to hours, minutes, and seconds
$hours_left = floor($remaining_seconds / 3600);
$minutes_left = floor(($remaining_seconds % 3600) / 60);
$seconds_left = $remaining_seconds % 60;

echo "Time left until Christmas 2024: {$hours_left} hours, {$minutes_left} minutes, {$seconds_left} seconds.\n";

// Advanced tip: localtime() is great for generating complex date-based logic when you need to manipulate specific time components separately. 
?>