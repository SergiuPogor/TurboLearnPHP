<?php

// Example comparing date() vs DateTime()

// Using date() to format the current date
$currentDate = date('Y-m-d H:i:s');  // Simple date format, but lacks manipulation abilities
echo $currentDate;

// Using DateTime to create, format, and manipulate dates
$dateTime = new DateTime();  // Current date and time
$dateTime->modify('+5 days');  // Adds 5 days to the current date
echo $dateTime->format('Y-m-d H:i:s');

// Working with DateTime for timezone manipulation
$dtWithTimezone = new DateTime('now', new DateTimeZone('America/New_York'));  // Set timezone
echo $dtWithTimezone->format('Y-m-d H:i:s');  // Outputs date and time with New York timezone

?>