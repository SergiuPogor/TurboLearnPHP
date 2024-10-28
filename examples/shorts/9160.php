<?php
// Define a function in a separate file
// File: /tmp/test/functions.php
function sayHello() {
    return "Hello, World!";
}

// Require the functions file
require_once '/tmp/test/functions.php'; // Load the file once
require_once '/tmp/test/functions.php'; // This will not cause an error

// Call the function
echo sayHello(); // Output: Hello, World!

// Demonstrating require usage
require '/tmp/test/non_existing_file.php'; // This will cause a fatal error
?>