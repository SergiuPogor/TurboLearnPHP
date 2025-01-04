<?php
// Get information about the Gregorian calendar
$calendarType = CAL_GREGORIAN; // Define the calendar type
$calendarInfo = cal_info($calendarType); // Retrieve calendar information

// Display the calendar information
echo "Calendar Name: Gregorian\n";
echo "First Month: " . $calendarInfo['months'][1] . "\n"; // Retrieve January
echo "Number of Months: " . count($calendarInfo['months']) . "\n"; // Total months

// Example of finding the max days in February (using maxdaysinmonth)
$februaryDays = $calendarInfo['maxdaysinmonth']; // Max days for any month
echo "Max Days in a Month: $februaryDays\n";

// Holidays in a specific calendar
$holidays = [
    'New Year' => 'January 1',
    'Christmas' => 'December 25',
];

// Displaying holidays
echo "\nHolidays in Gregorian Calendar:\n";
foreach ($holidays as $holiday => $date) {
    echo "$holiday is on $date.\n";
}
?>

