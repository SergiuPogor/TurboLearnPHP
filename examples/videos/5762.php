<?php
// This script demonstrates how to use date_sunrise() in PHP
// to calculate and display the sunrise time for a given date and location.

function display_sunrise_time($latitude, $longitude, $date) {
    // Convert date to timestamp
    $timestamp = strtotime($date);

    // Get sunrise time in seconds since epoch
    $sunrise = date_sunrise($timestamp, SUNFUNCS_RET_STRING, $latitude, $longitude);

    // If sunrise is null, handle the error
    if ($sunrise === null) {
        echo "Unable to calculate sunrise time for the given location and date.\n";
        return;
    }

    // Output the sunrise time
    echo "On " . $date . ", sunrise at latitude $latitude and longitude $longitude is at: $sunrise\n";
}

// Example Usage
try {
    // Define location coordinates and date
    $latitude = 34.0522; // Los Angeles
    $longitude = -118.2437; // Los Angeles
    $date = '2024-10-21'; // Date for calculation

    display_sunrise_time($latitude, $longitude, $date);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>