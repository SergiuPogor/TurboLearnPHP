<?php
// Convert a French Republican Calendar date to Julian Day using frenchtojd()

// Example date from the French Republican calendar:
// Year 14, month 7 (Messidor), day 15
$french_year = 14;
$french_month = 7; // Messidor
$french_day = 15;

// Converting to Julian Day using PHP's frenchtojd() function
$julian_day = frenchtojd($french_month, $french_day, $french_year);

// File operations - reading/writing this Julian date
$file_path = '/tmp/test/input.txt';

// Write the Julian Day to the file
file_put_contents($file_path, "Julian Day: " . $julian_day);

// Read from the file
$content = file_get_contents($file_path);

// Output the content (in a real-world app, you would process this data)
echo $content;


// Working with different use-cases and converting back

// Use-case 1: Calculate the difference between two dates
// Convert another French Republican date for comparison
$french_year_2 = 12;
$french_month_2 = 5; // Prairial
$french_day_2 = 3;

$julian_day_2 = frenchtojd($french_month_2, $french_day_2, $french_year_2);

// Calculate the difference in days between the two dates
$day_difference = $julian_day - $julian_day_2;
echo "Days between two dates: " . $day_difference;

// Use-case 2: Work with modern Gregorian dates and convert them to French Republican
$gregorian_date = "2024-07-14";
$timestamp = strtotime($gregorian_date);

// Convert Gregorian date to Julian Day
$gregorian_jd = gregoriantojd((int)date('m', $timestamp), (int)date('d', $timestamp), (int)date('Y', $timestamp));

// Now compare with French Republican Julian date
$jd_difference = $gregorian_jd - $julian_day;
echo "Julian Day difference from French Republican date: " . $jd_difference;

// Use-case 3: Handling multiple file outputs with different dates for comparison
$dates = [
    ['year' => 14, 'month' => 7, 'day' => 15],
    ['year' => 12, 'month' => 5, 'day' => 3],
    ['year' => 10, 'month' => 2, 'day' => 28]
];

foreach ($dates as $date) {
    $jd = frenchtojd($date['month'], $date['day'], $date['year']);
    file_put_contents("/tmp/test/jd_" . $date['year'] . ".txt", "Year: {$date['year']} JD: {$jd}\n", FILE_APPEND);
}

?>