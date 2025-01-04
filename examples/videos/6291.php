<?php

// Example: Using date_timestamp_set() to update DateTime object

// Create a DateTime object with the current date and time
$dateTime = new DateTime();

// Display the original date
echo "Original Date: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// Define a new timestamp (for example: January 1, 2025)
$newTimestamp = strtotime('2025-01-01 00:00:00');

// Use date_timestamp_set() to update the DateTime object
date_timestamp_set($dateTime, $newTimestamp);

// Display the updated date
echo "Updated Date: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// Example: Updating a timestamp based on user input
$userInput = '2024-05-15 10:30:00';
$userTimestamp = strtotime($userInput);
date_timestamp_set($dateTime, $userTimestamp);

// Display the date after user input update
echo "Date after user input: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// Example: Updating multiple DateTime objects
$dateTime1 = new DateTime('2023-12-01');
$dateTime2 = new DateTime('2023-12-15');

$newTimestamp1 = strtotime('2024-06-01');
$newTimestamp2 = strtotime('2024-06-15');

// Update timestamps for both DateTime objects
date_timestamp_set($dateTime1, $newTimestamp1);
date_timestamp_set($dateTime2, $newTimestamp2);

// Display updated dates
echo "Updated Date 1: " . $dateTime1->format('Y-m-d H:i:s') . "\n";
echo "Updated Date 2: " . $dateTime2->format('Y-m-d H:i:s') . "\n";

// Note: You can also use the DateTimeImmutable class for immutable DateTime objects

?>