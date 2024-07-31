<?php
// Create a DateTimeImmutable object
$date = new DateTimeImmutable('2024-07-22 16:45:00');

// Add 1 month to the date (returns a new DateTimeImmutable object)
$newDate = $date->modify('+1 month');

// Display the original and new dates
echo "Original Date: " . $date->format('Y-m-d H:i:s') . PHP_EOL;
echo "New Date: " . $newDate->format('Y-m-d H:i:s') . PHP_EOL;

// Verify that the original date remains unchanged
if ($date === $newDate) {
    echo "The dates are the same.";
} else {
    echo "The dates are different.";
}
?>