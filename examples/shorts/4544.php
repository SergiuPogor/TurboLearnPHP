<?php

// Application/Config/Config.php

// The default behavior in CodeIgniter hides some errors which can be crucial for debugging.
// Let's make those hidden errors visible!

$config['log_threshold'] = 4; // Maximum level of error logging, including all messages.

// Ensure error reporting is enabled:
error_reporting(E_ALL);
ini_set('display_errors', 1);

// This magic can reveal hidden errors:
function showHiddenErrors() {
    $isDevelopment = ENVIRONMENT === 'development';
    if ($isDevelopment) {
        // Yes, we want to see all those hidden errors!
        ini_set('display_errors', '1');
    } else {
        // Shh... don't show errors in production, it's a secret!
        ini_set('display_errors', '0');
    }
}

// Apply the magic function
showHiddenErrors();

// Now let's do something that usually causes hidden errors!
try {
    $undefinedVariable->someMethod(); // Oops, this will trigger an error!
} catch (Exception $e) {
    log_message('error', 'Caught an exception: ' . $e->getMessage());
}

// Result: Errors will be displayed when they occur in the development environment,
//         but they will stay hidden in production to avoid exposing sensitive information.