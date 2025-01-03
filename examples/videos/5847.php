<?php
// Example of converting Julian dates to Jewish dates using jdtojewish()
$julianDate = 2464406; // Example Julian date (July 17, 2024)

// Convert Julian date to Jewish date
$hebrewDate = jdtojewish($julianDate);

// Output the result
echo "Julian Date: $julianDate\n";
echo "Jewish Date: " . implode("-", $hebrewDate) . "\n";

// Converting multiple Julian dates
$julianDates = [2464400, 2464406, 2464412];
foreach ($julianDates as $date) {
    $hebrew = jdtojewish($date);
    echo "Julian Date: $date => Jewish Date: " . implode("-", $hebrew) . "\n";
}

// Example of getting the current Jewish date
$currentJulian = gregoriantojd(date("n"), date("j"), date("Y")); // Current Julian date
$currentHebrew = jdtojewish($currentJulian);
echo "Current Jewish Date: " . implode("-", $currentHebrew) . "\n";

// Example of using jdtojewish with additional parameters
$jd = 2464406; // Example Julian date
$hebrewWithParams = jdtojewish($jd, 1); // 1 for full format
echo "Full Jewish Date: " . implode("-", $hebrewWithParams) . "\n";
?>