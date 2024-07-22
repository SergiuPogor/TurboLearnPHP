<?php
// Example of handling time zones with PHP DateTime

// Create DateTime object for current time in default time zone
$defaultDateTime = new DateTime();

// Set a specific time zone
$timeZone = new DateTimeZone('America/New_York');
$nyDateTime = new DateTime('now', $timeZone);

// Convert to another time zone
$parisTimeZone = new DateTimeZone('Europe/Paris');
$parisDateTime = $nyDateTime->setTimezone($parisTimeZone);

// Output formatted dates
echo "Default Time: " . $defaultDateTime->format('Y-m-d H:i:s') . "<br>";
echo "New York Time: " . $nyDateTime->format('Y-m-d H:i:s') . "<br>";
echo "Paris Time: " . $parisDateTime->format('Y-m-d H:i:s') . "<br>";
?>