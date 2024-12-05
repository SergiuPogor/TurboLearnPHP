<?php
// Example 1: Using echo for simple output
echo "Hello, World!";  // fast and efficient

// Example 2: Using print for output (can be used in expressions)
$result = print "Hello, World!";  // returns 1, so we can assign it

// Example 3: Using echo with multiple parameters
echo "Hello", " ", "World!", " ", "PHP";  // echo allows multiple parameters

// Example 4: Using print in an expression
if (print "Hello, World!") {
    echo "Expression executed successfully!";
}

// Output: "Hello, World!" followed by "Expression executed successfully!"
?>