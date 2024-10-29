<?php

// Set the default time zone
date_default_timezone_set('America/New_York');

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Display the current date and time
echo "Current Date and Time: $currentDateTime\n";

// Example of changing the time zone
date_default_timezone_set('Europe/London');
$londonDateTime = date('Y-m-d H:i:s');

// Display the date and time in London
echo "Date and Time in London: $londonDateTime\n";

// What happens with an incorrect time zone
date_default_timezone_set('Invalid/Timezone');
$invalidDateTime = date('Y-m-d H:i:s');

// Display the date and time when an invalid timezone is set
echo "Invalid Time Zone Date and Time: $invalidDateTime\n"; // This might lead to a warning or an unexpected result

?>