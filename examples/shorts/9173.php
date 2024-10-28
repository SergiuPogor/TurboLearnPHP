<?php
// File: /tmp/test/timezone_fix.php

// Set the default timezone
date_default_timezone_set('America/New_York'); // Change to your desired timezone

// Function to demonstrate time usage
function showCurrentTime() {
    // Get current Unix timestamp
    $currentTime = time();
    // Format the current time
    $formattedTime = date('Y-m-d H:i:s', $currentTime);
    echo "Current Time: $formattedTime\n";
}

// Call the function to display the current time
showCurrentTime();