<?php
// Example 1: Debugging with phpdbg (command-line example)
echo "Starting phpdbg debugging\n";

// Start debugging with phpdbg command
// Run this via the terminal: phpdbg -q -e script.php

// Example 2: Debugging with Xdebug (web-based example)
ini_set('xdebug.remote_enable', 1);
ini_set('xdebug.remote_host', 'localhost');
ini_set('xdebug.remote_port', 9000);

// Enable Xdebug for step debugging
xdebug_break();

// Sample code to test Xdebug debugging
echo "Starting Xdebug debugging\n";
$number = 10;
echo "Number: $number\n";

// Set a breakpoint here in IDE
$number += 5;
echo "Updated Number: $number\n";

// Xdebug will allow you to inspect the call stack and variables in your IDE
?>