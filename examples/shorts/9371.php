<?php
// Function to calculate factorial using recursion
function factorial($n) {
    // Base case
    if ($n <= 1) {
        return 1;
    }
    // Recursive call
    return $n * factorial($n - 1);
}

// Function to calculate Fibonacci numbers using recursion with memoization
function fibonacci($n, &$memo = []) {
    // Base cases
    if ($n <= 1) {
        return $n;
    }
    // Check if result is already calculated
    if (!isset($memo[$n])) {
        // Store result in memoization array
        $memo[$n] = fibonacci($n - 1, $memo) + fibonacci($n - 2, $memo);
    }
    return $memo[$n];
}

// Example usage
echo "Factorial of 5: " . factorial(5) . "\n"; // Output: 120
echo "Fibonacci of 10: " . fibonacci(10) . "\n"; // Output: 55