<?php
// Display PHP configuration settings using phpinfo()
function displayPhpInfo() {
    // This will show all PHP settings and their values
    phpinfo();
}

// Call the function to execute
displayPhpInfo();

// Alternative way to get specific configuration values
// Here we are checking for error reporting level
$errorReporting = ini_get('error_reporting');
echo "Current error reporting level: " . $errorReporting;

// If needed, update settings dynamically (temporary)
ini_set('display_errors', '1'); // Enable error display
ini_set('display_startup_errors', '1'); // Show startup errors
?>