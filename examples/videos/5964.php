<?php

// Function to demonstrate the use of jdmonthname() in PHP
function convertJulianToMonthName($julianDate) {
    // Validate input: check if it's a valid Julian date
    if (!is_int($julianDate) || $julianDate < 0) {
        throw new InvalidArgumentException("Invalid Julian date provided.");
    }

    // Get the month name in English
    $monthName = jdmonthname($julianDate, CAL_GREGORIAN);
    
    return $monthName;
}

// Example usage
try {
    // Julian date for January 1, 2023
    $julianDate = gregoriantojd(1, 1, 2023); // Convert Gregorian to Julian
    echo "The month name for Julian date $julianDate is: " . convertJulianToMonthName($julianDate) . "\n";

    // Example for February 15, 2023
    $julianDate2 = gregoriantojd(2, 15, 2023);
    echo "The month name for Julian date $julianDate2 is: " . convertJulianToMonthName($julianDate2) . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Additional example: Array of Julian dates
$julianDates = [
    gregoriantojd(3, 10, 2023),
    gregoriantojd(4, 20, 2023),
    gregoriantojd(5, 30, 2023),
];

// Convert and display month names for each Julian date
foreach ($julianDates as $jd) {
    try {
        echo "Julian date $jd corresponds to month: " . convertJulianToMonthName($jd) . "\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>