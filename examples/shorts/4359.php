<?php
// PHP Dynamic Function Calls Example

// Define some functions
function greet() {
    echo "Hello, World!\n";
}

function farewell() {
    echo "Goodbye, World!\n";
}

// Array of function names
$functions = ['greet', 'farewell'];

// Loop through the array and call each function dynamically
foreach ($functions as $func) {
    if (function_exists($func)) {
        $func(); // Dynamic function call
    } else {
        echo "Function $func does not exist!\n";
    }
}

// For extra fun, let's call a function dynamically based on a variable
$funcName = 'greet';
if (function_exists($funcName)) {
    $funcName(); // Dynamic call based on variable
} else {
    echo "Function $funcName does not exist!\n";
}

// And remember, just like a bioluminescent shark, dynamic function calls can light up your PHP code!
?>