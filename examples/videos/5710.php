<?php

// Function to demonstrate the usage of juliantojd() in PHP
function convertDateToJulian($month, $day, $year) {
    // Validate the input date
    if (!checkdate($month, $day, $year)) {
        throw new Exception("Invalid date: $month/$day/$year");
    }

    // Convert the date to Julian Day Count
    $julianDate = juliantojd($month, $day, $year);
    
    return $julianDate;
}

// Sample data: Array of dates to be converted
$dateList = [
    ['month' => 1, 'day' => 1, 'year' => 2024],
    ['month' => 7, 'day' => 4, 'year' => 2024],
    ['month' => 12, 'day' => 25, 'year' => 2024],
];

// Convert and display each date's Julian Day Count
try {
    foreach ($dateList as $date) {
        $julian = convertDateToJulian($date['month'], $date['day'], $date['year']);
        echo "The Julian Day Count for {$date['month']}/{$date['day']}/{$date['year']} is $julian\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}