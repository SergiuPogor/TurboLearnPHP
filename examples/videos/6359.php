<?php

// Function to convert Unix timestamp to Julian Day Count
function convertUnixToJulian($unixTimestamp) {
    // Validate if the timestamp is a valid number
    if (!is_numeric($unixTimestamp) || $unixTimestamp < 0) {
        return "Invalid Unix timestamp provided.";
    }
    
    // Convert the Unix timestamp to Julian Day Count
    $julianDayCount = unixtojd($unixTimestamp);
    return $julianDayCount;
}

// Function to demonstrate the conversion
function demonstrateConversion() {
    // Sample Unix timestamps for demonstration
    $timestamps = [
        1672531199, // Example: New Year 2023
        1609459200, // Example: New Year 2021
        1577836800, // Example: New Year 2020
    ];
    
    foreach ($timestamps as $timestamp) {
        $julian = convertUnixToJulian($timestamp);
        echo "Unix Timestamp: $timestamp converts to Julian Day Count: $julian\n";
    }
}

// Main execution
demonstrateConversion();