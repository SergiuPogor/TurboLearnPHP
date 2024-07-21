<?php

// Example demonstrating PHP exception handling

// Define a custom exception class
class CustomException extends Exception {}

// Function that throws an exception
function divide($dividend, $divisor) {
    if ($divisor == 0) {
        throw new CustomException('Division by zero error!');
    }
    return $dividend / $divisor;
}

// Example usage of try-catch block to handle exceptions
try {
    // Attempt to divide
    echo divide(10, 2); // Output: 5
    echo divide(10, 0); // This will throw an exception
} catch (CustomException $e) {
    // Handle the exception
    echo "Caught exception: " . $e->getMessage();
}

?>