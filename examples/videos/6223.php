<?php

// Example: Correctly handling timezones in PHP

// Set the default timezone to avoid incorrect time display
date_default_timezone_set('America/New_York');

// Function to display the current date and time in different formats
function displayDateTime() {
    $currentDateTime = new DateTime();
    $formattedDate = $currentDateTime->format('Y-m-d H:i:s'); // Standard format
    $formattedDateLong = $currentDateTime->format('l, F j, Y g:i A'); // Long format

    // Outputting the date and time
    echo json_encode([
        'standard' => $formattedDate,
        'long' => $formattedDateLong,
        'timezone' => date_default_timezone_get() // Displaying the current timezone
    ]);
}

// Call the function to display the date and time
displayDateTime();

// If needed, you can switch timezones and show differences
date_default_timezone_set('Europe/London');
displayDateTime();

// Optionally, switch back to original timezone
date_default_timezone_set('America/New_York');

?>