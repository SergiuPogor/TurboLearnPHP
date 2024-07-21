// Example of optimizing PHP session management

// Start the session
session_start();

// Set session variables
$_SESSION['username'] = 'john_doe';
$_SESSION['last_login'] = time();

// Retrieve session variables
$username = $_SESSION['username'];

// Destroy session
session_destroy();