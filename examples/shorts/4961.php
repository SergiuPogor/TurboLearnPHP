<?php
// Define a date string with a custom format
$dateString = '22-07-2024 14:30';

// Define the format matching the date string
$format = 'd-m-Y H:i';

// Create a DateTime object from the custom format
$date = DateTime::createFromFormat($format, $dateString);

// Check for parsing errors
if ($date === false) {
    echo 'Error parsing date.';
} else {
    // Display the formatted date
    echo 'Parsed Date: ' . $date->format('Y-m-d H:i:s') . PHP_EOL;
}
?>