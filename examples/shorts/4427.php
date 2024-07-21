// Example of handling PHP sessions securely and efficiently

// Start session
session_start();

// Set session variables
$_SESSION['username'] = 'john_doe';
$_SESSION['user_id'] = 12345;

// Use session variables
echo "Username: " . $_SESSION['username'];

// Destroy session
session_destroy();