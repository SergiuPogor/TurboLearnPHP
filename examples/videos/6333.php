<?php

// This PHP script demonstrates how to use date_date_set() 
// to manipulate and adjust date values effectively.

$dateString = "2024-10-15"; // Original date string
$date = date_create($dateString); // Create a date object

// Display the original date
echo "Original Date: " . date_format($date, 'Y-m-d') . "\n";

// Set the date to a new value using date_date_set
$newYear = 2025;
$newMonth = 1; // January
$newDay = 10;

// Update the date object with the new values
date_date_set($date, $newYear, $newMonth, $newDay);

// Display the updated date
echo "Updated Date: " . date_format($date, 'Y-m-d') . "\n";

// Example of correcting a date with invalid values
$invalidDate = date_create("2024-02-30"); // Invalid date

if ($invalidDate) {
    echo "Invalid Date: " . date_format($invalidDate, 'Y-m-d') . "\n";
} else {
    echo "Date is invalid. Setting to default.\n";
    date_date_set($invalidDate, 2024, 3, 1); // Setting to March 1, 2024
}

// Final date check
echo "Corrected Date: " . date_format($invalidDate, 'Y-m-d') . "\n";

// Function to adjust dates based on user input
function adjustDate($year, $month, $day) {
    $date = date_create();
    date_date_set($date, $year, $month, $day);
    return date_format($date, 'Y-m-d');
}

// Example of adjusting a date based on parameters
$adjustedDate = adjustDate(2023, 12, 25);
echo "Adjusted Date: " . $adjustedDate . "\n";

// Example of chaining date manipulations
$dateChained = date_create("2024-05-15");
date_date_set($dateChained, 2024, 6, 1); // Change to June 1, 2024
date_modify($dateChained, '+1 month'); // Add a month
echo "Chained Date: " . date_format($dateChained, 'Y-m-d') . "\n";

?>