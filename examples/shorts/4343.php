// Example PHP code using error_log for debugging

// A function to demonstrate error logging
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        // Log an error if the denominator is zero
        error_log("Error: Division by zero attempted. Numerator: $numerator, Denominator: $denominator", 3, "/path/to/your/error.log");
        return false;
    }
    return $numerator / $denominator;
}

// Simulate an error
$result = divide(10, 0);

if ($result === false) {
    echo "An error occurred. Check the log for details.";
} else {
    echo "The result is: " . $result;
}