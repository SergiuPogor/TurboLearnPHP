<?php

// Example: Using date_create_immutable() for safe date manipulation

// Create an immutable date object for today's date
$today = date_create_immutable();

// Display the current date
echo "Today's date: " . $today->format('Y-m-d') . PHP_EOL;

// Add 5 days to the current date
$futureDate = $today->add(new DateInterval('P5D'));

// Display the future date
echo "Future date (5 days later): " . $futureDate->format('Y-m-d') . PHP_EOL;

// Check that the original date remains unchanged
echo "Original date still: " . $today->format('Y-m-d') . PHP_EOL;

// Create an immutable date object from a specific date string
$specificDate = date_create_immutable('2024-10-31');

// Display the specific date
echo "Specific date: " . $specificDate->format('Y-m-d') . PHP_EOL;

// Subtract 10 days from the specific date
$pastDate = $specificDate->sub(new DateInterval('P10D'));

// Display the past date
echo "Past date (10 days before): " . $pastDate->format('Y-m-d') . PHP_EOL;

// Check that the specific date remains unchanged
echo "Original specific date still: " . $specificDate->format('Y-m-d') . PHP_EOL;

?>