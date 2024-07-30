<?php
// Create a DateTime instance for a specific time in New York
$newYorkTime = new DateTime('2024-07-22 12:00:00', new DateTimeZone('America/New_York'));

// Create a DateTimeZone instance for London
$londonTimeZone = new DateTimeZone('Europe/London');

// Convert New York time to London time
$londonTime = $newYorkTime->setTimezone($londonTimeZone);

// Display both times
echo 'New York Time: ' . $newYorkTime->format('Y-m-d H:i:s') . PHP_EOL;
echo 'London Time: ' . $londonTime->format('Y-m-d H:i:s') . PHP_EOL;
?>