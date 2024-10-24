<?php

// Use case: You want to reset the session data (e.g., clear cart data), but still keep the session active,
// allowing the user to remain logged in, and maintain other session variables like login status.

// Start session
session_start();

// Example: Session data before unsetting
$_SESSION['user_id'] = 42;
$_SESSION['cart'] = [
    'item1' => ['name' => 'Laptop', 'price' => 1200],
    'item2' => ['name' => 'Mouse', 'price' => 50],
];

// You want to clear the cart but keep the user logged in.
// This is where `session_unset()` can be very useful.

session_unset(); // Unsets all session variables

// Check if session variables are cleared
// BUT, the session ID and session itself remain active!

// Now, let's compare it to `session_destroy()`, which ends the session entirely.

$_SESSION['user_id'] = 42; // Set user session again
$_SESSION['cart'] = [
    'item1' => ['name' => 'Laptop', 'price' => 1200],
    'item2' => ['name' => 'Mouse', 'price' => 50],
];

// End the session entirely - session_destroy() clears all session data and deletes the session ID cookie
session_destroy();

// Important: The session cookie is destroyed with `session_destroy()`, meaning the session is fully terminated.

session_start(); // Start a new session after destruction

// ----
// Advanced Scenario: Handling session management where some session variables need to be preserved.

// Use case: You want to reset only specific session variables but keep others like 'user_id'.
// Here's a trick to combine `session_unset()` with selective clearing of session data.

$_SESSION['user_id'] = 42; // Preserving user login status
$_SESSION['cart'] = [
    'item1' => ['name' => 'Laptop', 'price' => 1200],
    'item2' => ['name' => 'Mouse', 'price' => 50],
];
$_SESSION['preferences'] = [
    'theme' => 'dark',
    'notifications' => true,
];

// Custom session reset: Remove cart data, but keep the user logged in and preferences intact.
foreach ($_SESSION as $key => $value) {
    if ($key !== 'user_id' && $key !== 'preferences') {
        unset($_SESSION[$key]);
    }
}

// At this point, only 'user_id' and 'preferences' remain in the session.
// This technique gives you fine-grained control over session clearing, combining the power of `session_unset()` and selective unset.

// ----
// One more variation: Partial reset by using session_unset() followed by reassigning critical variables.

$_SESSION['user_id'] = 42;
$_SESSION['cart'] = [
    'item1' => ['name' => 'Laptop', 'price' => 1200],
    'item2' => ['name' => 'Mouse', 'price' => 50],
];

// Reset all session data, then immediately restore 'user_id'
session_unset();
$_SESSION['user_id'] = 42; // Restore user session after unsetting all other data

// This approach works when you want a hard reset but know exactly what needs to be preserved after clearing.

?>