<?php
// Get information about the Gregorian calendar
$calendarType = CAL_GREGORIAN; // Define the calendar type
$calendarInfo = cal_info($calendarType); // Retrieve calendar information

// Display the calendar information
echo "Calendar Name: " . $calendarInfo['calendar'] . "\n";
echo "First Month: " . $calendarInfo['months'][1] . "\n";
echo "Number of Months: " . $calendarInfo['months'] . "\n";
echo "Number of Days in February: " . $calendarInfo['days'][2] . "\n";

// Switching to another calendar type: Chinese Calendar
$calendarTypeChinese = CAL_CHINESE; // Define the calendar type for Chinese
$calendarInfoChinese = cal_info($calendarTypeChinese); // Retrieve calendar info

// Displaying Chinese calendar information
echo "\nChinese Calendar Info:\n";
echo "Calendar Name: " . $calendarInfoChinese['calendar'] . "\n";
echo "First Month: " . $calendarInfoChinese['months'][1] . "\n";
echo "Number of Months: " . $calendarInfoChinese['months'] . "\n";
echo "Number of Days in February: " . $calendarInfoChinese['days'][2] . "\n";

// Example: Getting holidays in a specific calendar
$holidays = [
    'New Year' => 'January 1',
    'Christmas' => 'December 25',
];

// Displaying holidays
echo "\nHolidays in Gregorian Calendar:\n";
foreach ($holidays as $holiday => $date) {
    echo "$holiday is on $date.\n";
}