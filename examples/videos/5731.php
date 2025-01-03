<?php

// Calculate Easter date for the current year
$year = date('Y');
$easterTimestamp = easter_date($year);
$easterDate = date('Y-m-d', $easterTimestamp);

// Save Easter date to a file for logging
file_put_contents('/tmp/test/easter_date.txt', "Easter in $year falls on: $easterDate\n");

// Example: Calculate Easter date for a range of years and log the results
$startYear = 2000;
$endYear = 2030;
$easterDates = [];

// Loop through the years and calculate Easter date for each year
for ($i = $startYear; $i <= $endYear; $i++) {
    $easterTimestamp = easter_date($i);
    $easterDates[$i] = date('Y-m-d', $easterTimestamp);
}

// Log the calculated dates to a file
$logData = "";
foreach ($easterDates as $year => $date) {
    $logData .= "Easter in $year falls on: $date\n";
}

file_put_contents('/tmp/test/easter_range_dates.txt', $logData);

// Easter date calculation in a leap year for testing purposes
$leapYear = 2024;
$leapYearEasterTimestamp = easter_date($leapYear);
$leapYearEasterDate = date('Y-m-d', $leapYearEasterTimestamp);
file_put_contents('/tmp/test/leap_year_easter_date.txt', "Easter in leap year $leapYear falls on: $leapYearEasterDate\n");

// Simulating how Easter date can be used for scheduling recurring events
function getEasterAndEventDates($year, $eventDaysAfterEaster) {
    $easterTimestamp = easter_date($year);
    $eventTimestamp = strtotime("+$eventDaysAfterEaster days", $easterTimestamp);
    return [
        'easter' => date('Y-m-d', $easterTimestamp),
        'event' => date('Y-m-d', $eventTimestamp)
    ];
}

// Example: Calculate an event 10 days after Easter for the next 5 years
for ($i = 2024; $i <= 2028; $i++) {
    $dates = getEasterAndEventDates($i, 10);
    echo "Easter in $i: {$dates['easter']}, Event Date: {$dates['event']}\n";
}

// Save the recurring event dates to a file
$eventLogData = "";
for ($i = 2024; $i <= 2028; $i++) {
    $dates = getEasterAndEventDates($i, 10);
    $eventLogData .= "Easter in $i: {$dates['easter']}, Event Date: {$dates['event']}\n";
}
file_put_contents('/tmp/test/recurring_event_dates.txt', $eventLogData);

// Additional dynamic example: Using Easter date to set company holiday schedule
$holidaySchedule = [
    'Good Friday' => strtotime('-2 days', $easterTimestamp),
    'Easter Monday' => strtotime('+1 day', $easterTimestamp),
    'Ascension Day' => strtotime('+39 days', $easterTimestamp)
];

// Logging the holiday schedule based on Easter date
$holidayLogData = "";
foreach ($holidaySchedule as $holiday => $timestamp) {
    $holidayLogData .= "$holiday in $year: " . date('Y-m-d', $timestamp) . "\n";
}
file_put_contents('/tmp/test/holiday_schedule.txt', $holidayLogData);

?>