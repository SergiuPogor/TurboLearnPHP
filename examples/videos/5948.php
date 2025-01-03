<?php

// Function to demonstrate jddayofweek usage
function displayJulianWeekdays(array $dates) {
    foreach ($dates as $date) {
        // Convert date to Julian Day Count
        $julianDay = gregoriantojd(
            (int)$date['month'], 
            (int)$date['day'], 
            (int)$date['year']
        );

        // Get the day of the week from Julian Day
        $dayOfWeek = jddayofweek($julianDay, 0); // 0 for numeric representation

        // Output result
        echo "Date: {$date['year']}-{$date['month']}-{$date['day']} - Day of Week: {$dayOfWeek}\n";
    }
}

// Sample dates array
$datesToCheck = [
    ['year' => 2024, 'month' => 10, 'day' => 21],
    ['year' => 1582, 'month' => 10, 'day' => 15], // Before Gregorian reform
    ['year' => 1600, 'month' => 3, 'day' => 1],  // Leap year
    ['year' => 1900, 'month' => 2, 'day' => 28], // Not a leap year
];

// Call the function with the sample dates
displayJulianWeekdays($datesToCheck);

// Additional example with jddayofweek in different formats
function displayFormattedJulianWeekdays(array $dates) {
    foreach ($dates as $date) {
        // Convert to Julian Day Count
        $julianDay = gregoriantojd(
            (int)$date['month'], 
            (int)$date['day'], 
            (int)$date['year']
        );

        // Get the day of the week in different formats
        $dayOfWeekNumeric = jddayofweek($julianDay, 0);
        $dayOfWeekString = jddayofweek($julianDay, 1); // 1 for textual representation

        // Output result
        echo "Date: {$date['year']}-{$date['month']}-{$date['day']} - Numeric: {$dayOfWeekNumeric}, String: {$dayOfWeekString}\n";
    }
}

// Call with another set of dates
$moreDatesToCheck = [
    ['year' => 2023, 'month' => 12, 'day' => 25], // Christmas
    ['year' => 2020, 'month' => 7, 'day' => 4],   // Independence Day
];

// Call the second function
displayFormattedJulianWeekdays($moreDatesToCheck);

?>