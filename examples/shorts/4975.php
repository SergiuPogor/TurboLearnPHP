<?php
// Example of using DateTimeImmutable for safer date manipulation

// Create a DateTimeImmutable object for now
$now = new DateTimeImmutable();

// Modify the date by adding 10 days
$newDate = $now->add(new DateInterval('P10D'));

// Output the original and new dates
echo "Original Date: " . $now->format('Y-m-d H:i:s') . PHP_EOL;
echo "New Date: " . $newDate->format('Y-m-d H:i:s') . PHP_EOL;

// Demonstrating that the original date object remains unchanged
if ($now === $newDate) {
    echo "Dates are the same." . PHP_EOL;
} else {
    echo "Dates are different." . PHP_EOL;
}
?>