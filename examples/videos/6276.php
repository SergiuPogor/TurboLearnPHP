<?php

// Example 1: Convert a Gregorian date to Julian Day Count
$gregorian_date_jd = cal_to_jd(CAL_GREGORIAN, 10, 22, 2024); // Oct 22, 2024
echo "Gregorian Date (JD): " . $gregorian_date_jd . "\n";

// Example 2: Convert a Julian date to Julian Day Count
$julian_date_jd = cal_to_jd(CAL_JULIAN, 10, 9, 2024); // Oct 9, 2024 (Julian calendar)
echo "Julian Date (JD): " . $julian_date_jd . "\n";

// Example 3: Convert a Hebrew date to Julian Day Count
$hebrew_date_jd = cal_to_jd(CAL_HEBREW, 1, 1, 5784); // 1st of Tishri, year 5784
echo "Hebrew Date (JD): " . $hebrew_date_jd . "\n";

// Example 4: Convert Julian Day Count back to a date in the Gregorian calendar
$gregorian_date = jdtogregorian($gregorian_date_jd); // Convert JD back to a Gregorian date
echo "Gregorian Date from JD: " . $gregorian_date . "\n";

// Example 5: Handling ancient or cross-calendar date calculations

// Consider a scenario where an app handles both Gregorian and Julian dates in historical archives
// Use the Julian Day Count to unify the comparison and conversion
$date_gregorian = cal_to_jd(CAL_GREGORIAN, 12, 25, 1582); // Gregorian calendar - start of Gregorian reform
$date_julian = cal_to_jd(CAL_JULIAN, 12, 25, 1582); // Julian calendar date

if ($date_gregorian === $date_julian) {
    echo "Both dates are the same in Julian Day Count.\n";
} else {
    echo "Dates differ: Gregorian JD ($date_gregorian) vs Julian JD ($date_julian)\n";
}

// Example 6: Storing Julian Day Count for future processing

// Suppose you need to store dates in a file for later calculations
$date_data = [
    'Gregorian' => $gregorian_date_jd,
    'Julian' => $julian_date_jd,
    'Hebrew' => $hebrew_date_jd
];

// Store in a JSON file
file_put_contents('/tmp/test/date_data.json', json_encode($date_data));

// Read the data back when needed
$stored_data = json_decode(file_get_contents('/tmp/test/date_data.json'), true);
echo "Stored Dates (JD): " . print_r($stored_data, true) . "\n";

// Example 7: Using Julian Day Count in an international application

// Suppose you're building an app that supports multiple calendars for international users
function convert_and_display_date($calendar, $day, $month, $year)
{
    $jd = cal_to_jd($calendar, $month, $day, $year);
    return jdtojulian($jd); // Convert back to Julian format for display
}

// Convert and display dates in various calendar formats
echo "Converted Julian Date (Gregorian): " . convert_and_display_date(CAL_GREGORIAN, 22, 10, 2024) . "\n";
echo "Converted Julian Date (Hebrew): " . convert_and_display_date(CAL_HEBREW, 1, 1, 5784) . "\n";
?>