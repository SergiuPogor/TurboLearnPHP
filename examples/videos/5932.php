<?php
// Example 1: Using gregoriantojd() for basic date conversion

// Define a sample Gregorian date
$day = 15;
$month = 10;
$year = 2024;

// Convert to Julian Day Count
$julianDay = gregoriantojd($month, $day, $year);

echo "Julian Day Count for {$year}-{$month}-{$day} is: $julianDay\n"; // Outputs Julian Day Count

// Example 2: Calculating the difference between two dates

// Define two Gregorian dates
$startDay = 1;
$startMonth = 1;
$startYear = 2000;

$endDay = 31;
$endMonth = 12;
$endYear = 2024;

// Convert both dates to Julian Day Count
$startJulian = gregoriantojd($startMonth, $startDay, $startYear);
$endJulian = gregoriantojd($endMonth, $endDay, $endYear);

// Calculate the difference in days
$difference = $endJulian - $startJulian;

echo "Difference between {$startYear}-{$startMonth}-{$startDay} and {$endYear}-{$endMonth}-{$endDay} is: $difference days\n";

// Example 3: Looping through a range of dates

// Define a range of years
$startYearRange = 2024;
$endYearRange = 2025;

// Loop through each month in the range
for ($year = $startYearRange; $year <= $endYearRange; $year++) {
    for ($month = 1; $month <= 12; $month++) {
        // Get the last day of the month
        $lastDay = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        
        // Convert the last day of the month to Julian Day Count
        $julianLastDay = gregoriantojd($month, $lastDay, $year);
        
        echo "Last day of {$year}-{$month} is: {$lastDay}, Julian Day Count: $julianLastDay\n";
    }
}

// Example 4: Historical date calculation

// Define a historical date
$historicalDay = 4;
$historicalMonth = 7;
$historicalYear = 1776;

// Convert to Julian Day Count
$historicalJulian = gregoriantojd($historicalMonth, $historicalDay, $historicalYear);

echo "Julian Day Count for {$historicalYear}-{$historicalMonth}-{$historicalDay} is: $historicalJulian\n";

// Note: Ensure to handle invalid dates appropriately in real applications
?>