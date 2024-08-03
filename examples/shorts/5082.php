<?php
// Example Jewish date
$year = 5784; // Jewish year
$month = 5;   // Jewish month
$day = 15;    // Jewish day

// Convert Jewish date to Julian Day Count
$julianDay = jewishtojd($month, $day, $year);

// Output the Julian Day Count
echo $julianDay; // Outputs the Julian Day Count
?>