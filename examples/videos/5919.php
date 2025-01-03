<?php
// Calculate Easter Sunday date for a given year
function getEasterDate($year) {
    // Calculate days until Easter
    $daysUntilEaster = easter_days($year);
    // Create a timestamp for January 1st of the given year
    $timestamp = strtotime("$year-01-01");
    // Calculate the date of Easter Sunday
    $easterDate = date("Y-m-d", strtotime("+$daysUntilEaster days", $timestamp));
    return $easterDate;
}

// Example usage
$currentYear = date("Y");
$easterDate = getEasterDate($currentYear);

// Display the Easter date
echo "Easter Sunday in $currentYear falls on: " . $easterDate . "<br>";

// Calculate days from today until Easter
$today = new DateTime();
$easterDateTime = new DateTime($easterDate);
$interval = $today->diff($easterDateTime);

// Display the number of days until Easter
echo "Days until Easter: " . $interval->days . "<br>";

// Using easter_days() to plan holidays
function getHolidayDates($year) {
    $easterSunday = getEasterDate($year);
    $holidayDates = [
        "Easter Sunday" => $easterSunday,
        "Good Friday" => date("Y-m-d", strtotime("$easterSunday -2 days")),
        "Easter Monday" => date("Y-m-d", strtotime("$easterSunday +1 day")),
    ];
    return $holidayDates;
}

// Get holidays for the current year
$holidays = getHolidayDates($currentYear);

// Display holiday dates
echo "Holidays for $currentYear:<br>";
foreach ($holidays as $holiday => $date) {
    echo "$holiday: $date<br>";
}
?>