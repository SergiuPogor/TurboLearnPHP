<?php
// Function to demonstrate the use of timezone_name_get
function displayUserTimezone($timezoneIdentifier) {
    // Create a DateTimeZone object
    $timezone = new DateTimeZone($timezoneIdentifier);
    
    // Retrieve the timezone name
    $timezoneName = timezone_name_get($timezone);
    
    // Display the result
    echo "The timezone for '$timezoneIdentifier' is: $timezoneName\n";
}

// Example usage with valid timezone identifiers
$timezones = [
    'America/New_York',
    'Europe/London',
    'Asia/Tokyo',
    'Australia/Sydney'
];

// Iterate through each timezone and display the name
foreach ($timezones as $timezone) {
    displayUserTimezone($timezone);
}

// Example of user-specific timezone handling
function getUserTimezone($userId) {
    // Simulate a user timezone retrieval from a database
    $userTimezones = [
        1 => 'America/Los_Angeles',
        2 => 'Asia/Kolkata',
        3 => 'Europe/Berlin'
    ];
    
    return $userTimezones[$userId] ?? 'UTC'; // Default to UTC if not found
}

// Display user timezone based on user ID
$userId = 2; // Example user ID
$userTimezone = getUserTimezone($userId);
displayUserTimezone($userTimezone);
?>