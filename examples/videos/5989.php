<?php

// Function to get user groups using posix_getgroups().
// This example demonstrates how to use posix_getgroups()
// to retrieve a user's group memberships.

function getUserGroups($username) {
    // Check if the username exists.
    if (posix_getpwnam($username) === false) {
        return "User not found.";
    }

    // Get the group IDs for the user.
    $groupIds = posix_getgroups();
    
    // Prepare an array to hold group names.
    $groupNames = [];
    
    // Retrieve group information for each group ID.
    foreach ($groupIds as $groupId) {
        $groupInfo = posix_getgrgid($groupId);
        
        // Check if the group info is valid.
        if ($groupInfo !== false) {
            // Append the group name to the array.
            $groupNames[] = $groupInfo['name'];
        }
    }
    
    return $groupNames;
}

// Example usage: Fetch and display groups for a specific user.
$username = "your_username_here"; // Change to a valid username
$userGroups = getUserGroups($username);

// Output the user's groups.
echo "User Groups for '$username': " . implode(", ", $userGroups) . PHP_EOL;

// Example function to check if a user belongs to a specific group.
function isUserInGroup($username, $group) {
    $groups = getUserGroups($username);
    return in_array($group, $groups);
}

// Check if the user is in a specific group.
$groupToCheck = "developers"; // Change to a valid group
if (isUserInGroup($username, $groupToCheck)) {
    echo "$username is a member of $groupToCheck." . PHP_EOL;
} else {
    echo "$username is not a member of $groupToCheck." . PHP_EOL;
}

?>