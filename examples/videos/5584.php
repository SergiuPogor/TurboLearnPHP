<?php

// Start a session
session_start();

// Simulate some session variable updates
$_SESSION['username'] = 'JohnDoe';
$_SESSION['role'] = 'admin';

// Condition that may trigger an error or unexpected behavior
$errorOccurred = true; // Simulate an error condition

if ($errorOccurred) {
    // Error detected, so we abort the session changes
    echo "Error occurred! Aborting session changes..." . PHP_EOL;
    session_abort(); // Discard any changes made to the session
} else {
    // If no error occurred, we can safely save the session changes
    echo "Session changes are saved." . PHP_EOL;
}

// Print current session variables to show the effect
print_r($_SESSION);

// Further use-case: After handling, we might want to save the session state
// For example, you might want to check and log the session state.
// You could also implement a feature where session data is conditionally logged.
if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = true; // Mark as logged in if not already set
}

// Output the session state after handling
echo "Current session state: " . json_encode($_SESSION) . PHP_EOL;

// End the session when done
session_write_close();

?>