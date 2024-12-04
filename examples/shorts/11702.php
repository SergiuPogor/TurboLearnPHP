<?php

// Using new DateTime() to create a date object
$date1 = new DateTime('2024-12-01');
$date1->modify('+1 day');
echo $date1->format('Y-m-d'); // Output: 2024-12-02

// Using strtotime() to calculate date from a string
$date2 = strtotime('2024-12-01 +1 day');
echo date('Y-m-d', $date2); // Output: 2024-12-02

// Handling time zones with DateTime
$date3 = new DateTime('2024-12-01', new DateTimeZone('Europe/London'));
$date3->setTimezone(new DateTimeZone('America/New_York'));
echo $date3->format('Y-m-d H:i:s'); // Output: 2024-12-01 00:00:00 New York time

// Comparing performance: new DateTime() vs strtotime()
$start = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    new DateTime('2024-12-01');
}
echo "DateTime: " . (microtime(true) - $start) . " seconds\n";

$start = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    strtotime('2024-12-01');
}
echo "strtotime: " . (microtime(true) - $start) . " seconds\n";

?>