<?php
// Define the start date for the recurring event
$startDate = new DateTime('2024-01-01');

// Define the interval for the recurring event (e.g., every month)
$interval = new DateInterval('P1M');

// Define the end date for the recurring events
$endDate = new DateTime('2024-12-01');

// Create a DatePeriod instance with the start date, interval, and end date
$period = new DatePeriod($startDate, $interval, $endDate);

// Iterate over the period and display each date
foreach ($period as $date) {
    echo $date->format('Y-m-d') . PHP_EOL;
}
?>