<?php

// Function to validate user input for a date
function isValidDate($month, $day, $year) {
    // Check if the date is valid using checkdate
    if (checkdate($month, $day, $year)) {
        return "The date {$month}/{$day}/{$year} is valid.";
    } else {
        return "The date {$month}/{$day}/{$year} is invalid.";
    }
}

// Example usage with user inputs
$userInputs = [
    ['month' => 2, 'day' => 29, 'year' => 2024], // Valid leap year date
    ['month' => 4, 'day' => 31, 'year' => 2023], // Invalid date
    ['month' => 12, 'day' => 25, 'year' => 2023], // Valid date
    ['month' => 11, 'day' => 31, 'year' => 2023]  // Invalid date
];

foreach ($userInputs as $input) {
    $month = $input['month'];
    $day = $input['day'];
    $year = $input['year'];
    echo isValidDate($month, $day, $year) . "\n";
}

?>