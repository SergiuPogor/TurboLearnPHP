// Example PHP code for logging errors to a file

// Enable error logging to a file
ini_set('log_errors', 1);
ini_set('error_log', '/var/log/php_errors.log');

// Example error scenario (division by zero)
$denominator = 0;
try {
    $result = 10 / $denominator;
} catch (Exception $e) {
    // Log error message to the file specified in error_log setting
    error_log('Error: Division by zero occurred.');
}