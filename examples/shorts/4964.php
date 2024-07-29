<?php
// Define the date format
$format = 'd-m-Y H:i:s';

// Create a DateTimeImmutable object from a custom date string
$dateString = '22-07-2024 16:45:00';
$date = DateTime::createFromFormat($format, $dateString);

// Check if the date creation was successful
if ($date && $date->format($format) === $dateString) {
    echo "Parsed Date: " . $date->format('Y-m-d H:i:s') . PHP_EOL;
} else {
    echo "Failed to parse date. Check the format or input." . PHP_EOL;
}

// Handle a different date format
$anotherFormat = 'Y/m/d H:i';
$anotherDateString = '2024/07/22 16:45';
$anotherDate = DateTime::createFromFormat($anotherFormat, $anotherDateString);

if ($anotherDate && $anotherDate->format($anotherFormat) === $anotherDateString) {
    echo "Parsed Another Date: " . $anotherDate->format('Y-m-d H:i:s') . PHP_EOL;
} else {
    echo "Failed to parse another date. Check the format or input." . PHP_EOL;
}
?>