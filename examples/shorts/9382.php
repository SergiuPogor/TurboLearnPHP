<?php

// Example of date manipulation in PHP

// Method 1: Using DateTime
$date = new DateTime('2024-01-01'); // Create a new DateTime object
$date->modify('+10 days'); // Add 10 days
echo "New date: " . $date->format('Y-m-d') . "\n"; // Output the new date

// Method 2: Using strtotime
$timestamp = strtotime('2024-01-01 +10 days'); // Convert to timestamp and add days
echo "New date: " . date('Y-m-d', $timestamp) . "\n"; // Format and output the date

// Method 3: Comparing two dates
$date1 = new DateTime('2024-01-01');
$date2 = new DateTime('2024-12-31');
if ($date1 < $date2) {
    echo "$date1 is earlier than $date2\n";
} else {
    echo "$date1 is later than or equal to $date2\n";
}

// Method 4: Calculating the difference between two dates
$interval = $date1->diff($date2);
echo "Difference: " . $interval->days . " days\n"; // Output the difference in days

?>