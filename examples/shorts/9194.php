<?php

// Using require_once for essential files
require_once 'config.php'; // Stops execution if the file is missing

// Using include_once for optional files
include_once 'optional.php'; // Continues execution even if the file is missing

// Main application logic
function loadUserData($userId) {
    // Simulating user data retrieval
    if (!$userId) {
        throw new Exception("User ID is required!");
    }
    return "User data for ID: $userId";
}

// Example usage
try {
    echo loadUserData(123); // Valid User ID
    echo loadUserData(null); // This will cause an error
} catch (Exception $e) {
    // Handle exceptions gracefully
    echo "Error: " . $e->getMessage();
}

?>