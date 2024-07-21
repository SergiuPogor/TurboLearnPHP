<?php

// Example of PHP exception handling

// Custom exception class
class CustomException extends Exception {}

// Function to simulate exception throwing
function divideNumbers($numerator, $denominator) {
    try {
        if ($denominator == 0) {
            throw new CustomException("Division by zero not allowed.");
        }
        return $numerator / $denominator;
    } catch (CustomException $e) {
        echo "Caught exception: " . $e->getMessage() . "<br>";
    }
}

// Using the function with try-catch block
echo "Result: ";
divideNumbers(10, 0); // This will trigger the exception

?>