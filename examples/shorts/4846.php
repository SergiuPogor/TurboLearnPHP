<?php
// Example demonstrating PHP session management issues

// Start session
session_start();

// Function to set session save path
function setSessionSavePath(string $path): void {
    if (!is_dir($path) || !is_writable($path)) {
        throw new RuntimeException("Session save path is not writable.");
    }
    session_save_path($path);
}

// Example usage
try {
    // Set a valid session save path
    setSessionSavePath('/var/lib/php/sessions');

    // Set session variable
    $_SESSION['user'] = 'JohnDoe';

    // Retrieve session variable
    echo 'User: ' . $_SESSION['user'];
} catch (RuntimeException $e) {
    echo "Error: " . $e->getMessage();
}
?>