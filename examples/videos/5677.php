<?php
// Example PHP script to demonstrate jdtogregorian()
function convertJulianToGregorian($julianDate) {
    // Convert Julian date to Gregorian date
    $gregorianDate = jdtogregorian($julianDate);
    return $gregorianDate;
}

// Example usage with random Julian dates
$julianDates = [
    2451910, // Corresponds to January 1, 1975
    2451565, // Corresponds to January 1, 1974
    2451976  // Corresponds to January 1, 1976
];

foreach ($julianDates as $julianDate) {
    $gregorianDate = convertJulianToGregorian($julianDate);
    echo "Julian Date: $julianDate => Gregorian Date: $gregorianDate\n";
}

// Another use case: converting a Julian date from user input
if (isset($_POST['julian_date'])) {
    $userJulianDate = (int)$_POST['julian_date'];
    $userGregorianDate = convertJulianToGregorian($userJulianDate);
    echo "Converted User Julian Date: $userJulianDate => Gregorian Date: $userGregorianDate\n";
}

// Reminder: Always validate user inputs before processing