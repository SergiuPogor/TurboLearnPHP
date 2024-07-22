<?php
// Handling PHP session issues with checks and configuration

// Start the session
session_start();

// Check if session is properly started and session save path is writable
if (session_status() === PHP_SESSION_ACTIVE) {
    // Verify session save path
    if (!is_writable(ini_get('session.save_path'))) {
        die('Session save path is not writable.');
    }

    // Check session lifetime
    if (ini_get('session.gc_maxlifetime') < 3600) { // Example: 1 hour
        echo 'Session garbage collection lifetime is too short.';
    }

    // Verify session cookie path
    $expectedPath = '/your-app-path/';
    if (ini_get('session.cookie_path') !== $expectedPath) {
        echo 'Session cookie path does not match expected path.';
    }

    // Handle session data correctly
    if (!isset($_SESSION['initialized'])) {
        $_SESSION['initialized'] = true;
        echo 'Session initialized successfully.';
    } else {
        echo 'Session is already initialized.';
    }
} else {
    echo 'Failed to start session.';
}
?>
<form action="" method="post">
    <input type="submit" value="Test Session Handling" />
</form>