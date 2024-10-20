<?php

// Function to demonstrate the use of date_isodate_set
function setDateUsingIsoFormat($year, $month, $day, $hour = 0, $minute = 0, $second = 0) {
    // Create a new DateTime object
    $date = new DateTime();

    // Use date_isodate_set to set the ISO date
    date_isodate_set($date, $year, $month, $day, $hour, $minute, $second);

    return $date->format(DateTime::ISO8601);
}

// Example usage
try {
    // Set a specific date (2024-10-20 14:00:00)
    $isoDate = setDateUsingIsoFormat(2024, 10, 20, 14, 0, 0);
    echo "ISO Date: " . $isoDate . "\n";

    // Another example with different time
    $isoDate2 = setDateUsingIsoFormat(2023, 5, 15, 8, 30, 0);
    echo "ISO Date: " . $isoDate2 . "\n";

    // Invalid date example to showcase error handling
    $isoDate3 = setDateUsingIsoFormat(2024, 13, 1); // Invalid month
    echo "ISO Date: " . $isoDate3 . "\n"; // This line won't execute

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Additional function to demonstrate validation before setting date
function setValidatedIsoDate($year, $month, $day) {
    // Validate month range
    if ($month < 1 || $month > 12) {
        throw new Exception("Invalid month: $month. Must be between 1 and 12.");
    }

    // Validate day range
    if ($day < 1 || $day > 31) {
        throw new Exception("Invalid day: $day. Must be between 1 and 31.");
    }

    return setDateUsingIsoFormat($year, $month, $day);
}

// Demonstration of validated date setting
try {
    $validatedIsoDate = setValidatedIsoDate(2024, 10, 20);
    echo "Validated ISO Date: " . $validatedIsoDate . "\n";
} catch (Exception $e) {
    echo "Validation Error: " . $e->getMessage() . "\n";
}

?>