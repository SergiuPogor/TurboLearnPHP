<?php
// Start the session for user tracking
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    echo "Welcome back, user ID: " . $_SESSION['user_id'];
} else {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Set session variables securely
$_SESSION['user_role'] = 'admin'; // For user role tracking
$_SESSION['last_activity'] = time(); // Store last activity time

// Function to check session timeout
function checkSessionTimeout($timeoutDuration = 1800) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeoutDuration) {
        // If session is timed out, destroy it
        session_unset(); 
        session_destroy(); 
        header("Location: timeout.php");
        exit();
    }
}

// Call the session timeout checker
checkSessionTimeout();

// Function to regenerate session ID for security
function regenerateSession() {
    if (session_id() === '' || !isset($_SESSION['user_id'])) {
        return; // Do nothing if there's no session
    }
    session_regenerate_id(true); // Regenerate session ID and delete old session
}

// Call the regenerate session function
regenerateSession();

// Example of storing more user data in session
$_SESSION['cart'] = [
    'item1' => ['name' => 'Laptop', 'price' => 1200],
    'item2' => ['name' => 'Mouse', 'price' => 50]
];

// Display the cart contents
echo "Your shopping cart contains: ";
foreach ($_SESSION['cart'] as $item) {
    echo $item['name'] . " priced at $" . $item['price'] . "<br>";
}

// Example of clearing a specific session variable
function clearUserData($key) {
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]); // Remove specified session data
    }
}

// Call function to clear a specific session variable
clearUserData('cart');

// Close the PHP session
session_write_close();
?>