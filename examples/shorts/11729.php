<?php
// Example 1: Using require
require 'config.php'; // Fatal error if file is not found

// Example 2: Using include_once
include_once 'config.php'; // No error if already included

// Example 3: Checking if file exists before requiring it
if (file_exists('config.php')) {
    require 'config.php'; 
} else {
    echo "Config file is missing!";
}

// Example 4: Using include_once with conditional check
if (!function_exists('some_function')) {
    include_once 'helper.php'; // Prevents re-inclusion of the file
}
?>