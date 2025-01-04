<?php

// Function to display timezone location details
function displayTimezoneLocation($timezoneIdentifier) {
    // Get the timezone object
    $timezone = new DateTimeZone($timezoneIdentifier);
    
    // Get the location details
    $location = timezone_location_get($timezone);
    
    // Display the timezone details
    echo "Timezone Identifier: " . $timezoneIdentifier . "\n";
    echo "Timezone Location: " . $location['country_code'] . ", " . $location['latitude'] . ", " . $location['longitude'] . "\n";
    echo "Comments: " . $location['comments'] . "\n";
}

// Example usage with different timezone identifiers
$timezones = ['America/New_York', 'Europe/London', 'Asia/Tokyo'];

foreach ($timezones as $timezone) {
    displayTimezoneLocation($timezone);
}

// Function to handle user input for timezone
function getUserTimezone() {
    // Assume user input is taken from a form or console
    $userTimezone = readline("Enter a timezone (e.g., Europe/Berlin): ");
    
    // Validate timezone identifier
    if (in_array($userTimezone, DateTimeZone::listIdentifiers())) {
        displayTimezoneLocation($userTimezone);
    } else {
        echo "Invalid timezone identifier. Please try again.\n";
    }
}

// Get timezone from user
getUserTimezone();

?>