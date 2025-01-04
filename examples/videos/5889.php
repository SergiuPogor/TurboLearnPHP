<?php

// Function to calculate future date using time()
function calculateFutureDate($daysFromNow) {
    // Get the current Unix timestamp
    $currentTime = time();
    
    // Calculate the future date by adding days
    $futureTime = $currentTime + ($daysFromNow * 86400); // 86400 seconds in a day
    
    // Return the formatted future date
    return date('Y-m-d H:i:s', $futureTime);
}

// Function to calculate past date using time()
function calculatePastDate($daysAgo) {
    // Get the current Unix timestamp
    $currentTime = time();
    
    // Calculate the past date by subtracting days
    $pastTime = $currentTime - ($daysAgo * 86400);
    
    // Return the formatted past date
    return date('Y-m-d H:i:s', $pastTime);
}

// Example usage
$daysToAdd = 10;
$daysToSubtract = 5;

$futureDate = calculateFutureDate($daysToAdd);
$pastDate = calculatePastDate($daysToSubtract);

echo "Future Date: " . $futureDate . "\n";
echo "Past Date: " . $pastDate . "\n";

// Reminder feature example
function setReminder($daysFromNow) {
    $reminderDate = calculateFutureDate($daysFromNow);
    echo "Reminder set for: " . $reminderDate . "\n";
}

// Set a reminder for 3 days from now
setReminder(3);

?>