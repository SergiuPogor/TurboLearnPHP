<?php

// Example: Using date_format() to format dates in PHP

// Function to format a given date
function formatDate($dateString, $format) {
    // Create a DateTime object from the input string
    $date = new DateTime($dateString);
    
    // Format the date using the specified format
    return date_format($date, $format);
}

// Sample dates and formats
$dateToFormat1 = "2024-10-21 14:35:00";
$format1 = "Y-m-d H:i:s"; // Output: 2024-10-21 14:35:00

$dateToFormat2 = "2024-10-21 14:35:00";
$format2 = "l, F j, Y"; // Output: Monday, October 21, 2024

// Format the dates and print the results
echo "Formatted Date 1: " . formatDate($dateToFormat1, $format1) . "\n";
echo "Formatted Date 2: " . formatDate($dateToFormat2, $format2) . "\n";

// Example 2: Handling time zones with date_format()
function formatDateWithTimezone($dateString, $format, $timezone) {
    // Create a DateTime object from the input string
    $date = new DateTime($dateString, new DateTimeZone($timezone));
    
    // Format the date using the specified format
    return date_format($date, $format);
}

// Sample date with timezone
$dateWithTimezone = "2024-10-21 14:35:00";
$formatTimezone = "Y-m-d H:i:s T"; // Output: 2024-10-21 14:35:00 UTC

// Format the date with timezone and print the result
echo "Formatted Date with Timezone: " . formatDateWithTimezone($dateWithTimezone, $formatTimezone, "UTC") . "\n";

// Example 3: Parsing and formatting dates
function parseAndFormatDate($dateString) {
    $date = DateTime::createFromFormat("d/m/Y", $dateString);
    
    if ($date) {
        return date_format($date, "Y-m-d"); // Convert to Y-m-d format
    } else {
        return "Invalid date format.";
    }
}

// Sample date to parse
$dateToParse = "21/10/2024"; // Input: 21/10/2024
echo "Parsed and Formatted Date: " . parseAndFormatDate($dateToParse) . "\n";

?>