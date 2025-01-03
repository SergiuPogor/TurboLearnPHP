<?php
// Example function to convert Julian date to Gregorian date using cal_from_jd()
function convertJulianToGregorian($julianDate) {
    // Get the calendar type
    $calendarType = CAL_GREGORIAN; // Gregorian calendar

    // Convert Julian day count to an array with details
    $dateDetails = cal_from_jd($julianDate, $calendarType);

    // Format the result for better readability
    return sprintf(
        "Converted Date: %s %d, %d",
        $dateDetails['month'],
        $dateDetails['day'],
        $dateDetails['year']
    );
}

// Example of converting Julian Day Count 2459773 (January 1, 2023)
$julianDate = 2459773;
$convertedDate = convertJulianToGregorian($julianDate);

// Output the converted date
echo $convertedDate;
?>