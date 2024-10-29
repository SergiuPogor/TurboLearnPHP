<?php
// Example demonstrating the use of ini_set in PHP

// Set memory limit dynamically
ini_set('memory_limit', '256M');

// Set error reporting level
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

// Simulate an operation that might use more memory
$array = [];
for ($i = 0; $i < 100000; $i++) {
    $array[] = str_repeat("Hello World! ", 100);
}

// Output current memory usage
echo "Current memory usage: " . memory_get_usage() . " bytes\n";

// Check if error reporting is set correctly
if (ini_get('display_errors')) {
    echo "Error reporting is ON\n";
}