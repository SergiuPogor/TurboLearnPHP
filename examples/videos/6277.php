<?php

// Example 1: Comparing two dates using date_diff()
$date1 = new DateTime("2024-10-22");
$date2 = new DateTime("2023-05-01");

// Calculate the difference
$interval = date_diff($date1, $date2);

// Display the difference
echo "Difference: " . $interval->format('%y years, %m months, and %d days') . "\n";

// Example 2: Finding the age of a person
$birthDate = new DateTime("1990-01-15");
$currentDate = new DateTime("now");
$age = date_diff($birthDate, $currentDate);
echo "Age: " . $age->format('%y years, %m months, and %d days old') . "\n";

// Example 3: Check for deadlines
$deadline = new DateTime("2024-12-31");
$today = new DateTime("now");
$diffToDeadline = date_diff($today, $deadline);
if ($today > $deadline) {
    echo "Deadline has passed by: " . $diffToDeadline->format('%y years, %m months, and %d days') . "\n";
} else {
    echo "Time left until deadline: " . $diffToDeadline->format('%y years, %m months, and %d days') . "\n";
}

// Example 4: Loop through a range of dates
$startDate = new DateTime("2024-01-01");
$endDate = new DateTime("2024-01-10");

$period = new DatePeriod($startDate, new DateInterval('P1D'), $endDate);
foreach ($period as $date) {
    echo $date->format("Y-m-d") . "\n"; // Display each date in the range
}

// Example 5: Storing date differences in an array
$datePairs = [
    ['2024-05-01', '2024-05-10'],
    ['2023-12-25', '2024-01-01'],
    ['2022-02-20', '2023-02-20']
];

$dateDifferences = [];
foreach ($datePairs as $pair) {
    $dateA = new DateTime($pair[0]);
    $dateB = new DateTime($pair[1]);
    $interval = date_diff($dateA, $dateB);
    $dateDifferences[] = $interval->format('%y years, %m months, %d days');
}

// Output all differences
echo "Date differences:\n";
foreach ($dateDifferences as $difference) {
    echo $difference . "\n";
}

// Example 6: Using date_diff with a custom format
function customDateDiff($date1, $date2)
{
    $interval = date_diff($date1, $date2);
    return sprintf("%d years, %d months, %d days", $interval->y, $interval->m, $interval->d);
}

$date1 = new DateTime("2015-05-20");
$date2 = new DateTime("2024-10-22");
echo "Custom formatted difference: " . customDateDiff($date1, $date2) . "\n";
?>