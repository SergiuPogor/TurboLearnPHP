<?php

// Define a French date
$frenchDate = '15/08/2024'; // Format: day/month/year

// Split the French date into components
list($day, $month, $year) = explode('/', $frenchDate);

// Convert French date to Julian Day Count
$julianDay = frenchtojd((int)$month, (int)$day, (int)$year);

// Output the Julian Day Count
echo "Julian Day Count for French date {$frenchDate} is: {$julianDay}" . PHP_EOL;

// Convert Julian Day Count back to Gregorian date (for validation)
$gregorianDate = jdtogregorian($julianDay);
echo "Gregorian date corresponding to Julian Day Count is: {$gregorianDate}" . PHP_EOL;

?>