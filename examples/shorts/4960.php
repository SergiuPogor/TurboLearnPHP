<?php
// Create a DateTimeImmutable instance for a specific date
$date = new DateTimeImmutable('2024-07-22');

// Add 10 days to the date without modifying the original object
$newDate = $date->add(new DateInterval('P10D'));

// Subtract 3 months from the new date
$finalDate = $newDate->sub(new DateInterval('P3M'));

// Display the original and final dates
echo 'Original Date: ' . $date->format('Y-m-d') . PHP_EOL;
echo 'Final Date: ' . $finalDate->format('Y-m-d') . PHP_EOL;
?>