<?php

// Define the date string to be converted
$dateString = '2024-10-06 14:30:00';

// Create a DateTime object from the date string
$dateTime = new DateTime($dateString);

// Check if the DateTime object was created successfully
if ($dateTime) {
    // Retrieve the Unix timestamp using date_timestamp_get
    $timestamp = date_timestamp_get($dateTime);
    
    // Output the timestamp
    echo "The Unix timestamp for {$dateString} is: {$timestamp}" . PHP_EOL;

    // Example of creating multiple DateTime objects
    $dateStrings = [
        '2024-12-25 00:00:00',
        '2025-01-01 12:00:00',
        '2023-07-15 18:45:00'
    ];

    // Loop through each date string
    foreach ($dateStrings as $date) {
        $dateTime = new DateTime($date);
        $timestamp = date_timestamp_get($dateTime);
        echo "The Unix timestamp for {$date} is: {$timestamp}" . PHP_EOL;
    }

    // Additional example using a DateTimeImmutable object
    $immutableDate = new DateTimeImmutable('2024-10-06 14:30:00');
    $immutableTimestamp = date_timestamp_get($immutableDate);
    echo "The Unix timestamp for the immutable date is: {$immutableTimestamp}" . PHP_EOL;
} else {
    // Handle error in creating DateTime object
    echo "Error creating DateTime object." . PHP_EOL;
}