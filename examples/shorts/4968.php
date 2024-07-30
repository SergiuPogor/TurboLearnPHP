<?php
// Example of using DateTimeImmutable for safe date operations

// Original date
$originalDate = new DateTimeImmutable('2024-07-22');

// Modify the date (immutable, so $modifiedDate is a new object)
$modifiedDate = $originalDate->modify('+1 month');

// Output the dates
echo "Original Date: " . $originalDate->format('Y-m-d') . PHP_EOL;
echo "Modified Date: " . $modifiedDate->format('Y-m-d') . PHP_EOL;

// Example with time manipulation
$originalDateTime = new DateTimeImmutable('2024-07-22 10:00:00');
$modifiedDateTime = $originalDateTime->modify('+2 hours');

echo "Original DateTime: " . $originalDateTime->format('Y-m-d H:i:s') . PHP_EOL;
echo "Modified DateTime: " . $modifiedDateTime->format('Y-m-d H:i:s') . PHP_EOL;
?>