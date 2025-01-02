<?php

// Database configuration
$host = 'localhost';
$username = 'root';
$password = 'password';
$database = 'my_database';

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

// Get the thread ID of the current connection
$threadId = $mysqli->thread_id;

// Display the thread ID
echo "Current thread ID: $threadId\n";

// Example: Use the thread ID for debugging
// Let's simulate a process where we track this ID in a log file
$logFile = '/tmp/test/connection_log.txt';
$logMessage = "Connection established with thread ID: $threadId\n";

// Append log message to the log file
file_put_contents($logFile, $logMessage, FILE_APPEND);

// Simulate a long-running query
sleep(5); // Simulating a delay in execution

// After the query is done, we can log the end of the connection
$logMessage = "Finished processing with thread ID: $threadId\n";
file_put_contents($logFile, $logMessage, FILE_APPEND);

// Close the database connection
$mysqli->close();
echo "Database connection closed.\n";

?>