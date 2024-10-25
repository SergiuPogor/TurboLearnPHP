<?php

// Function to demonstrate floating-point precision handling
function calculateTotalWithPrecision($prices) {
    // Initialize total variable
    $total = 0.0;

    // Calculate total using precise floating-point operations
    foreach ($prices as $price) {
        $total += $price;
    }

    // Return the total with proper rounding
    return round($total, 2);
}

// Example prices (in dollars)
$prices = [19.99, 5.49, 2.75, 3.99, 10.00];

// Calculate total and display it
$totalPrice = calculateTotalWithPrecision($prices);
echo "Total Price: $" . number_format($totalPrice, 2) . "<br />";

// Function to demonstrate common floating-point issues
function demonstrateFloatIssue() {
    $a = 0.1;
    $b = 0.2;
    $sum = $a + $b; // Expected 0.3, but will not be exactly 0.3 due to floating-point representation

    echo "0.1 + 0.2 = " . $sum . "<br />"; // Output might be 0.30000000000000004
}

// Call the function to show the floating-point issue
demonstrateFloatIssue();

// Using GMP for exact precision on integers
function gmpAddition($numbers) {
    $total = gmp_init(0);
    foreach ($numbers as $number) {
        $total = gmp_add($total, gmp_init($number * 100)); // Scale up to avoid float issues
    }
    return gmp_div_q($total, gmp_init(100)); // Scale back down
}

// Example usage of GMP
$gmpPrices = [19.99, 5.49, 2.75];
$totalGmpPrice = gmpAddition($gmpPrices);
echo "GMP Total Price: $" . number_format($totalGmpPrice, 2) . "<br />";

?>