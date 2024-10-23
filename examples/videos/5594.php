<?php

function convertJulianToGregorian(int $julianDay): string {
    // Convert Julian Day to Gregorian date
    return jdtojulian($julianDay);
}

function displayConvertedDates(array $julianDays): void {
    foreach ($julianDays as $jd) {
        $gregorianDate = convertJulianToGregorian($jd);
        echo "Julian Day: $jd => Gregorian Date: $gregorianDate\n";
    }
}

// Example usage
$julianDaysToConvert = [
    2459901, // Example Julian Day
    2460000, // Another Julian Day
    2460100  // Yet another Julian Day
];

displayConvertedDates($julianDaysToConvert);

// Bonus: Convert current date to Julian Day and back
function convertCurrentDateToJulian(): int {
    // Get current date
    $currentDate = new DateTime();
    // Convert to Julian Day
    return gregoriantojd($currentDate->format('n'), $currentDate->format('j'), $currentDate->format('Y'));
}

function convertBackToGregorian(int $julianDay): void {
    $gregorianDate = jdtogregorian($julianDay);
    echo "Current Julian Day: " . convertCurrentDateToJulian() . " => Back to Gregorian: $gregorianDate\n";
}

// Call conversion functions
echo "Converted Current Date:\n";
convertBackToGregorian(convertCurrentDateToJulian());

?>