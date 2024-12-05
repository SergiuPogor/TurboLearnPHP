<?php
// Example 1: Using date() for simple date formatting
$formattedDate = date('Y-m-d H:i:s');
echo $formattedDate;  // Output: Current date and time in 'YYYY-MM-DD HH:MM:SS' format

// Example 2: Using DateTime for complex date manipulation
$date = new DateTime();
$date->modify('+2 weeks');  // Add 2 weeks to the current date
echo $date->format('Y-m-d');  // Output: Date after adding 2 weeks

// Example 3: Using DateTime for timezone manipulation
$datetime = new DateTime('now', new DateTimeZone('Europe/London'));
echo $datetime->format('Y-m-d H:i:s');  // Output: Current date and time in London timezone

// Example 4: Using date() with custom timestamp
$timestamp = strtotime('2024-01-15 09:00:00');
$formattedTimestamp = date('Y-m-d H:i:s', $timestamp);
echo $formattedTimestamp;  // Output: '2024-01-15 09:00:00'
?>