<?php

// Get the current timezone
$timezone = new DateTimeZone('America/New_York');

// Retrieve the transitions for the timezone
$transitions = $timezone->getTransitions();

// Function to display timezone transitions
function displayTimezoneTransitions($transitions) {
    foreach ($transitions as $transition) {
        echo "Transition Time: " . date('Y-m-d H:i:s', $transition['ts']) . "\n";
        echo "Offset: " . $transition['offset'] . " seconds\n";
        echo "Is DST: " . ($transition['isdst'] ? 'Yes' : 'No') . "\n";
        echo "Abbreviation: " . $transition['abbr'] . "\n";
        echo "----------------------------------\n";
    }
}

// Call the function to display transitions
displayTimezoneTransitions($transitions);

// Example of how to get transitions for a different timezone
$timezoneLondon = new DateTimeZone('Europe/London');
$londonTransitions = $timezoneLondon->getTransitions();
displayTimezoneTransitions($londonTransitions);

// Advanced example: Get transitions for a specific date range
function getTransitionsForDateRange($timezone, $start, $end) {
    $transitions = [];
    $allTransitions = $timezone->getTransitions();
    foreach ($allTransitions as $transition) {
        if ($transition['ts'] >= $start && $transition['ts'] <= $end) {
            $transitions[] = $transition;
        }
    }
    return $transitions;
}

// Define a date range
$startDate = strtotime('2023-01-01');
$endDate = strtotime('2024-01-01');

// Get transitions in the specified date range
$transitionsInRange = getTransitionsForDateRange($timezone, $startDate, $endDate);
displayTimezoneTransitions($transitionsInRange);

?>