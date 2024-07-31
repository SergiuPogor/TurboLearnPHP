<?php
// Create a DateTimeImmutable instance for the start date
$startDate = new DateTimeImmutable('2024-01-01');

// Create a DateInterval instance for the interval of 2 weeks
$interval = new DateInterval('P14D');

// Calculate the end date by adding the interval to the start date
$endDate = $startDate->add($interval);

// Check if a specific date is within the interval
$specificDate = new DateTimeImmutable('2024-01-10');
if ($specificDate >= $startDate && $specificDate <= $endDate) {
    echo 'The date is within the interval!';
} else {
    echo 'The date is outside the interval.';
}
?>