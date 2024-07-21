// Example PHP code demonstrating the use of Xdebug for debugging

// Install Xdebug extension in your PHP environment
// Configure Xdebug settings in php.ini or .ini file

// Example function to demonstrate debugging
function calculateFactorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * calculateFactorial($n - 1);
    }
}

// Enable Xdebug and set breakpoints in your IDE

// Call the function with a test case
$result = calculateFactorial(5);

// Output the result
echo "Factorial of 5 is: $result\n";

// Use your IDE to inspect variables, step through code execution, and analyze performance