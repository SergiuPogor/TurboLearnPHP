<?php

// Scenario: Including essential configurations or core dependencies

// Preferred: Using `require` to avoid silent failure if the file is missing or contains errors
require '/tmp/test/config.php'; // Stops execution if file is not found or contains an error
require '/tmp/test/database.php'; // For database setup, `require` ensures it's loaded properly

// Alternative: Using `include` for optional files, like optional plugins or features
include '/tmp/test/optional-plugin.php'; // Fails silently if file is missing, allowing app to continue

// Demonstrating conditional use with functions and fallback
function loadSettings(): array
{
    $settings = [];

    // Primary configuration file
    if (file_exists('/tmp/test/settings.php')) {
        require '/tmp/test/settings.php'; // Critical settings, so using require
    } else {
        // Fallback default settings if the file is missing
        $settings = ['theme' => 'light', 'timezone' => 'UTC'];
    }

    return $settings;
}

// Additional Example: Loading scripts with error handling
try {
    require '/tmp/test/essential-library.php'; // Stop if library is missing
} catch (Exception $e) {
    error_log("Critical file missing: " . $e->getMessage());
    exit("Application stopped due to missing critical file.");
}

// For further flexibility, use `include_once` or `require_once` to prevent duplicate loading
require_once '/tmp/test/init.php';
include_once '/tmp/test/extra-config.php';

?>