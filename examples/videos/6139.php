<?php
// Define a function to demonstrate date manipulation using mktime
function generateDateExamples() {
    // Current date and time
    $currentDate = time();
    echo "Current Timestamp: " . $currentDate . "\n";

    // Create a timestamp for a specific date
    $specificDate = mktime(0, 0, 0, 12, 25, 2024); // December 25, 2024
    echo "Timestamp for December 25, 2024: " . $specificDate . "\n";

    // Calculate a date 10 days in the future
    $futureDate = mktime(0, 0, 0, date('n'), date('j') + 10, date('Y'));
    echo "Timestamp for 10 days from now: " . $futureDate . "\n";

    // Calculate a date 3 months ago
    $pastDate = mktime(0, 0, 0, date('n') - 3, date('j'), date('Y'));
    echo "Timestamp for 3 months ago: " . $pastDate . "\n";

    // Adjust for leap years
    $leapYearDate = mktime(0, 0, 0, 2, 29, 2024); // February 29, 2024
    echo "Timestamp for Leap Day 2024: " . $leapYearDate . "\n";
}

// Call the function to show the results
generateDateExamples();
?>