<?php

// Extract specific parts of the current date using idate() for performance optimization

// Get the current year
$currentYear = idate('Y');
echo "Current Year: $currentYear" . PHP_EOL;

// Get the current month as a number (1-12)
$currentMonth = idate('m');
echo "Current Month: $currentMonth" . PHP_EOL;

// Get the current day of the month (1-31)
$currentDay = idate('d');
echo "Current Day: $currentDay" . PHP_EOL;

// Get the current hour in 24-hour format (0-23)
$currentHour = idate('H');
echo "Current Hour: $currentHour" . PHP_EOL;

// Use idate() to determine if the current year is a leap year
$isLeapYear = (idate('L') === 1);
echo "Is Leap Year: " . ($isLeapYear ? 'Yes' : 'No') . PHP_EOL;

// Application Example: Generating a log file name using current date parts
$logFileName = '/tmp/test/log_' . idate('Y') . '_' . idate('m') . '_' . idate('d') . '.txt';
echo "Log File Name: $logFileName" . PHP_EOL;

// More Complex Use-Case: Check if current time is within business hours
$businessStartHour = 9;  // 9 AM
$businessEndHour = 17;   // 5 PM
$currentHour = idate('H');

if ($currentHour >= $businessStartHour && $currentHour < $businessEndHour) {
    echo "We are currently within business hours." . PHP_EOL;
} else {
    echo "We are currently outside of business hours." . PHP_EOL;
}

// Checking the current quarter of the year using idate()
$currentQuarter = ceil(idate('m') / 3);
echo "Current Quarter: Q$currentQuarter" . PHP_EOL;

// Scheduling system: Check if today is a weekday or weekend using idate()
$currentDayOfWeek = idate('w');
$isWeekday = ($currentDayOfWeek >= 1 && $currentDayOfWeek <= 5);  // Monday to Friday
echo "Is it a weekday? " . ($isWeekday ? 'Yes' : 'No') . PHP_EOL;

// Generating timestamps for daily report updates
$reportUpdateTime = idate('U');  // Unix timestamp
echo "Current Unix Timestamp: $reportUpdateTime" . PHP_EOL;

?>