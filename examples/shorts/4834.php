<?php

// Recursive function to calculate factorial
function factorial(int $n): int {
    // Base case: factorial of 0 or 1 is 1
    if ($n === 0 || $n === 1) {
        return 1;
    }
    
    // Recursive case: n * factorial of (n-1)
    return $n * factorial($n - 1);
}

// Test cases
try {
    echo "Factorial of 5: " . factorial(5) . "\n"; // Expected output: 120
    echo "Factorial of 3: " . factorial(3) . "\n"; // Expected output: 6
    echo "Factorial of 0: " . factorial(0) . "\n"; // Expected output: 1
    echo "Factorial of 7: " . factorial(7) . "\n"; // Expected output: 5040
    echo "Factorial of -1: " . factorial(-1) . "\n"; // Undefined behavior: Negative number
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>