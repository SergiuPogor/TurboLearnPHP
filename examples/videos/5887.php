<?php

// Define a function to set user ID
function changeUser($newEuid) {
    // Check current effective user ID
    $currentEuid = posix_geteuid();
    
    // Attempt to change effective user ID
    if (posix_seteuid($newEuid)) {
        echo "Effective user ID changed from {$currentEuid} to {$newEuid}\n";
    } else {
        echo "Failed to change effective user ID. Check permissions.\n";
    }
}

// Example usage
$desiredUserId = 1001; // Replace with a valid user ID
changeUser($desiredUserId);

// Example: reverting to original user ID
$currentEuid = posix_geteuid();
if (posix_seteuid($currentEuid)) {
    echo "Reverted back to original user ID: {$currentEuid}\n";
} else {
    echo "Failed to revert to original user ID. Check permissions.\n";
}

?>