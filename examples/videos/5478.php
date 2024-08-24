<?php

// Using gmdate() to handle global date and time in UTC consistently

// Get current UTC date in 'Y-m-d' format
$currentUTCDate = gmdate('Y-m-d');
echo "Current UTC Date: $currentUTCDate" . PHP_EOL;

// Get current UTC time in 'H:i:s' format
$currentUTCTime = gmdate('H:i:s');
echo "Current UTC Time: $currentUTCTime" . PHP_EOL;

// Generate a unique timestamp for logging purposes
$logTimestamp = gmdate('Y-m-d\TH:i:s\Z');
echo "Log Timestamp (UTC): $logTimestamp" . PHP_EOL;

// Create a log entry using gmdate() to ensure UTC standardization
$logEntry = "User login at " . gmdate('Y-m-d H:i:s') . " UTC";
$logFile = '/tmp/test/log_utc.txt';
file_put_contents($logFile, $logEntry . PHP_EOL, FILE_APPEND);
echo "Log Entry Created: $logEntry" . PHP_EOL;

// Scheduling example: Create a future date by adding days using gmdate()
$daysToAdd = 7;
$futureDate = gmdate('Y-m-d', strtotime("+$daysToAdd days"));
echo "Future Date in 7 Days (UTC): $futureDate" . PHP_EOL;

// Handling daylight saving changes: gmdate() ignores local daylight saving, keeping consistent UTC
$daylightSavingChangeDate = gmdate('Y-m-d H:i:s', strtotime('2024-03-10 02:00:00'));
echo "UTC Time during DST change: $daylightSavingChangeDate" . PHP_EOL;

// Synchronizing time between servers: Using gmdate() ensures all servers log in UTC
$syncTimestamp = gmdate('Y-m-d\TH:i:s\Z', time());
echo "Synchronized Timestamp (UTC): $syncTimestamp" . PHP_EOL;

// API Response Date Example: Returning current date in UTC for global users
$apiResponseDate = gmdate('Y-m-d\TH:i:s\Z');
echo "API Response Date (UTC): $apiResponseDate" . PHP_EOL;

// Using gmdate() to generate a filename with UTC timestamp
$utcFileName = '/tmp/test/report_' . gmdate('Y_m_d_H_i_s') . '.txt';
echo "Generated Filename with UTC Date: $utcFileName" . PHP_EOL;

// Writing to the file with gmdate() timestamp to ensure UTC time logging
file_put_contents($utcFileName, "Report generated at UTC: " . gmdate('Y-m-d H:i:s') . PHP_EOL);
echo "File Created with UTC Timestamp: $utcFileName" . PHP_EOL;

?>