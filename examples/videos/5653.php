<?php

// Example of using jdtofrench() to convert a Julian date to the French Republican Calendar

// Let's first calculate the Julian day for a given Gregorian date
$julian_day = gregoriantojd(10, 5, 1793);  // Date: 5th October 1793

// Convert the Julian day to French Republican calendar using jdtofrench
$french_date = jdtofrench($julian_day);
echo "French Republican Date for 5th October 1793: $french_date\n";

// Alternative approach - converting a different Julian date
$julian_day_2 = gregoriantojd(11, 12, 1800);  // Date: 12th November 1800
$french_date_2 = jdtofrench($julian_day_2);
echo "French Republican Date for 12th November 1800: $french_date_2\n";

// BONUS: Dynamic input handling for Julian to French conversion in real applications

function convertToFrenchRepublican($day, $month, $year) {
    $julian_day = gregoriantojd($month, $day, $year);
    return jdtofrench($julian_day);
}

// Usage of the dynamic function for different dates
$french_republican_date = convertToFrenchRepublican(6, 10, 1795);  // Date: 6th October 1795
echo "French Republican Date for 6th October 1795: $french_republican_date\n";

// Another date conversion example with input from user or data file
$french_republican_date_input = convertToFrenchRepublican(21, 4, 1798);  // Date: 21st April 1798
echo "French Republican Date for 21st April 1798: $french_republican_date_input\n";

// BONUS: Handling edge cases - Julian dates outside the French Republican calendar era

$edge_case_date = convertToFrenchRepublican(25, 12, 1899);  // Date: 25th December 1899
if ($edge_case_date) {
    echo "Converted date: $edge_case_date\n";
} else {
    echo "The date is outside the French Republican calendar range.\n";
}

// BONUS: Logging the conversion results to a file for auditing or further processing

$log_file = '/tmp/test/conversion_log.txt';
file_put_contents($log_file, "Converted date: $french_date\n", FILE_APPEND);
file_put_contents($log_file, "Converted date: $french_date_2\n", FILE_APPEND);
file_put_contents($log_file, "Converted date: $french_republican_date\n", FILE_APPEND);
file_put_contents($log_file, "Converted date: $french_republican_date_input\n", FILE_APPEND);

?>