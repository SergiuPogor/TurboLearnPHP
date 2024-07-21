<?php

// Example demonstrating the use of try-catch and finally in PHP error handling

try {
    // Code that may throw an exception
    $randomNumber = random_int(1, 10);
    if ($randomNumber > 5) {
        throw new Exception("Random number is greater than 5");
    }
    echo "Random number generated successfully: $randomNumber\n";
} catch (Exception $e) {
    // Exception handling
    echo "Exception caught: " . $e->getMessage() . "\n";
} finally {
    // Cleanup code (always executed)
    echo "Finally block executed for cleanup\n";
}

?>