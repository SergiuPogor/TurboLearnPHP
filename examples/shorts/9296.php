<?php

// Example of using DateTime to manipulate dates easily

// Step 1: Create a DateTime object for the current date
$currentDate = new DateTime();

// Step 2: Add 10 days to the current date using DateInterval
$dateInterval = new DateInterval('P10D');  // P = Period, 10D = 10 Days
$currentDate->add($dateInterval);

// Step 3: Format the new date and display it (Y-m-d format)
$formattedDate = $currentDate->format('Y-m-d');
echo $formattedDate;

// Step 4: Subtract 5 months and 3 days from the current date
$dateIntervalSubtract = new DateInterval('P5M3D');
$currentDate->sub($dateIntervalSubtract);

// Format and display the updated date
$formattedSubtractedDate = $currentDate->format('Y-m-d');
echo $formattedSubtractedDate;

// Step 5: Compare two dates easily using DateTime
$date1 = new DateTime('2023-12-01');
$date2 = new DateTime('2024-01-15');

// Compare dates: returns -1 if date1 is earlier, 1 if later, or 0 if equal
$comparisonResult = $date1 <=> $date2;  // Spaceship operator

// Step 6: Working with timezones
$timezone = new DateTimeZone('America/New_York');
$currentDateWithTimezone = new DateTime('now', $timezone);
echo $currentDateWithTimezone->format('Y-m-d H:i:s');

// Optional: Reading input from a file and creating DateTime object
$inputFile = '/tmp/test/input.txt';
$inputDate = file_get_contents($inputFile);
$dateFromFile = DateTime::createFromFormat('Y-m-d', trim($inputDate));

// Verify if the date is valid and format it
if ($dateFromFile) {
    echo $dateFromFile->format('Y-m-d');
}
?>