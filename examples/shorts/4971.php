<?php
// Example of using DateTime::modify to dynamically adjust dates

// Create a new DateTime object for a specific date
$date = new DateTime('2024-07-22');

// Modify the date by adding 1 month
$date->modify('+1 month');
echo "Date after adding 1 month: " . $date->format('Y-m-d') . PHP_EOL;

// Modify the date by subtracting 7 days
$date->modify('-7 days');
echo "Date after subtracting 7 days: " . $date->format('Y-m-d') . PHP_EOL;

// Modify the date by adding 2 years
$date->modify('+2 years');
echo "Date after adding 2 years: " . $date->format('Y-m-d') . PHP_EOL;
?>