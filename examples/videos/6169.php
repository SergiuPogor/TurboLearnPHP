<?php

// Creating a DateTime object from a specific date string
$date1 = date_create('2023-01-15');

// Check if the date was created successfully
if ($date1) {
    echo "Date created: " . date_format($date1, 'Y-m-d') . "\n";
} else {
    echo "Error creating date.";
}

// Creating a DateTime object with the current date and time
$date2 = date_create();

// Display current date
echo "Current Date: " . date_format($date2, 'Y-m-d H:i:s') . "\n";

// Modify the date
date_modify($date2, '+1 month');
echo "Date after one month: " . date_format($date2, 'Y-m-d H:i:s') . "\n";

// Create a DateTime object for a specific timezone
$date3 = date_create('2023-02-20 15:00:00', timezone_open('America/New_York'));
echo "Date in New York: " . date_format($date3, 'Y-m-d H:i:s') . "\n";

// Create a date from a timestamp
$timestamp = strtotime('2023-03-10 10:30:00');
$date4 = date_create('@' . $timestamp);
echo "Date from timestamp: " . date_format($date4, 'Y-m-d H:i:s') . "\n";

// Calculate the difference between two dates
$interval = date_diff($date1, $date3);
echo "Difference between dates: " . $interval->format('%R%a days') . "\n";

// Closing the DateTime objects
unset($date1, $date2, $date3, $date4);

?>