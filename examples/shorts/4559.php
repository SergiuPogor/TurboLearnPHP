<?php

// Example of using Xdebug for PHP debugging

// Enable Xdebug in php.ini or via CLI options

// Example function to demonstrate debugging
function calculateSum($a, $b) {
    $sum = $a + $b;
    
    // Start debugging with Xdebug
    // Set breakpoints and trace variables
    return $sum;
}

// Example usage:
$num1 = 10;
$num2 = 5;

$result = calculateSum($num1, $num2);

echo "The sum of $num1 and $num2 is: $result";

?>