<?php

// Example demonstrating PHP try-catch vs error suppression

// Example function that may throw an exception
function divide($numerator, $denominator) {
    if ($denominator === 0) {
        throw new Exception("Division by zero!");
    }
    return $numerator / $denominator;
}

// Using try-catch to handle exceptions
try {
    $result = divide(10, 0); // This will throw an exception
    echo "Result: " . $result; // This line will not execute if exception thrown
} catch (Exception $e) {
    echo "Exception caught: " . $e->getMessage() . "\n";
}

// Using error suppression to hide warnings
$undefinedVar = @$someUndefinedVariable;
echo "This line will execute even if \$someUndefinedVariable is undefined.";

?>