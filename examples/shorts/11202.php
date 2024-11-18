<?php
// Example using is_null
$user = null;
if (is_null($user)) {
    echo "User is null.\n"; // Output: User is null.
}

// Example using empty
$items = "";
if (empty($items)) {
    echo "Items are empty.\n"; // Output: Items are empty.
}

// Example where empty checks for more than null
$zero = 0;
if (empty($zero)) {
    echo "Zero is considered empty.\n"; // Output: Zero is considered empty.
}

// Example using is_null for precise null check
$age = 25;
if (!is_null($age)) {
    echo "Age is set.\n"; // Output: Age is set.
}
?>