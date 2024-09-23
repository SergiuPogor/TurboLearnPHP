<?php

// Set session save path (optional)
session_save_path('/tmp/sessions');

// Start a session
session_start();

// Example session data
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'example_user';

// Output current session data
echo "Current session data: " . print_r($_SESSION, true) . PHP_EOL;

// Trigger garbage collection for session data
if (session_gc()) {
    echo "Session garbage collection completed successfully." . PHP_EOL;
} else {
    echo "Failed to perform session garbage collection." . PHP_EOL;
}

// End the session
session_write_close();

// Check if old sessions have been cleaned up
$sessionFiles = glob('/tmp/sessions/*');
echo "Remaining session files: " . count($sessionFiles) . PHP_EOL;

?>