<?php
// Set the default timezone to UTC
date_default_timezone_set('UTC');

// Function to convert time to a different timezone
function convert_timezone($time, $from_tz, $to_tz) {
    // Create a new DateTime object with the provided time and from timezone
    $date = new DateTime($time, new DateTimeZone($from_tz));
    // Change the timezone of the DateTime object
    $date->setTimezone(new DateTimeZone($to_tz));
    // Return the formatted date and time in the new timezone
    return $date->format('Y-m-d H:i:s');
}

// Example usage
$time = '2024-06-28 15:00:00';
$from_timezone = 'America/New_York';
$to_timezone = 'Asia/Tokyo';

// Convert the time and print it with a touch of humor
echo "Original Time ($from_timezone): $time\n";
echo "Converted Time ($to_timezone): " . convert_timezone($time, $from_timezone, $to_timezone) . "\n";

// Adding humor to our conversion
echo "Wow! Time really flies when you jump 13 hours ahead!\n";
?>