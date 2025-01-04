<?php

// Example: Using date_time_set() to manipulate time within DateTime objects

// Step 1: Create a new DateTime object
$date = new DateTime('2024-10-22');

// Step 2: Set a specific time (e.g., 14:35:20) using date_time_set()
date_time_set($date, 14, 35, 20);
echo "Updated DateTime: " . $date->format('Y-m-d H:i:s') . "\n";

// Step 3: Modify the time further, adding microseconds
date_time_set($date, 18, 45, 50, 500000); // 18:45:50.500000
echo "DateTime with microseconds: " . $date->format('Y-m-d H:i:s.u') . "\n";

// Step 4: Working with dynamic time values
$current_time = new DateTime();
$random_hour = rand(0, 23);
$random_minute = rand(0, 59);
$random_second = rand(0, 59);

// Set a random time on the current date
date_time_set($current_time, $random_hour, $random_minute, $random_second);
echo "Random Time DateTime: " . $current_time->format('Y-m-d H:i:s') . "\n";

// Step 5: Handling multiple DateTime objects
$date1 = new DateTime('2024-10-01');
$date2 = new DateTime('2024-10-31');

// Set time on both dates
date_time_set($date1, 9, 30, 0); // Set time to 09:30:00 on date1
date_time_set($date2, 23, 59, 59); // Set time to 23:59:59 on date2

echo "Date1 with time: " . $date1->format('Y-m-d H:i:s') . "\n";
echo "Date2 with time: " . $date2->format('Y-m-d H:i:s') . "\n";

// Step 6: Advanced usage with timezones
$timezone = new DateTimeZone('America/New_York');
$datetime_ny = new DateTime('2024-10-22', $timezone);

// Set specific time in New York timezone
date_time_set($datetime_ny, 12, 0, 0); // Noon in New York
echo "New York DateTime with custom time: " . $datetime_ny->format('Y-m-d H:i:s') . "\n";

// Step 7: Store date and time in a file
$date_file = '/tmp/test/time_data.txt';
file_put_contents($date_file, $date->format('Y-m-d H:i:s'));

// Step 8: Compare DateTime objects with different times
$compare_date1 = new DateTime('2024-10-22 14:35:20');
$compare_date2 = new DateTime('2024-10-22 18:45:50');

// Check if DateTime objects are different
if ($compare_date1 < $compare_date2) {
    echo "Date1 is earlier than Date2\n";
} else {
    echo "Date1 is later than or the same as Date2\n";
}

// Step 9: Modify time using DateInterval (Alternative method)
$interval = new DateInterval('PT3H15M'); // Add 3 hours and 15 minutes
$compare_date1->add($interval);
echo "Date1 after adding interval: " . $compare_date1->format('Y-m-d H:i:s') . "\n";

// Step 10: Advanced tip - Apply date_time_set in loops for batch processing
$date_batch = new DateTime('2024-10-22');
for ($i = 0; $i < 5; $i++) {
    date_time_set($date_batch, rand(0, 23), rand(0, 59), rand(0, 59));
    echo "Batch DateTime $i: " . $date_batch->format('Y-m-d H:i:s') . "\n";
}