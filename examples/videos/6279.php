<?php

// Step 1: Get the effective group ID of the current process
$effectiveGid = posix_getegid();

// Step 2: Display the effective group ID
echo "The effective group ID is: " . $effectiveGid . "\n";

// Step 3: Check if the effective GID matches a specific group ID
$expectedGid = 1000; // Example group ID
if ($effectiveGid === $expectedGid) {
    echo "You are in the expected group!\n";
} else {
    echo "Warning: You are NOT in the expected group!\n";
}

// Step 4: Use the effective GID in a permission check
if (posix_getegid() === $expectedGid) {
    // Proceed with operations allowed for this group
    echo "You have permission to access this resource.\n";
} else {
    // Deny access to the resource
    die("Access denied: Insufficient permissions.\n");
}

// Step 5: Example of a function that checks permissions based on GID
function checkGroupPermissions($requiredGid) {
    if (posix_getegid() !== $requiredGid) {
        die("Access denied: You do not belong to the required group.\n");
    }
    echo "Access granted.\n";
}

// Step 6: Call the function with the required group ID
checkGroupPermissions($expectedGid);
?>