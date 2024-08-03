<?php
// Example of using DateTimeZone to handle timezone conversions

// Create a new DateTime object in the default timezone
$date = new DateTime('2024-07-22 12:00:00', new DateTimeZone('America/New_York'));

// Output the date in the original timezone
echo "Original Time (New York): " . $date->format('Y-m-d H:i:s') . PHP_EOL;

// Change the timezone to 'Europe/London'
$date->setTimezone(new DateTimeZone('Europe/London'));

// Output the date in the new timezone
echo "Converted Time (London): " . $date->format('Y-m-d H:i:s') . PHP_EOL;

// Create a new DateTime object with a specific timezone directly
$dateLondon = new DateTime('2024-07-22 12:00:00', new DateTimeZone('Europe/London'));
echo "Directly Set Time (London): " . $dateLondon->format('Y-m-d H:i:s') . PHP_EOL;
?>