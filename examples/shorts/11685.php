<?php
// Example 1: Using include (allows the script to continue even if the file is missing)
include 'file_that_does_not_exist.php';
echo "This will still execute, even though the included file is missing.\n";

// Example 2: Using require (stops execution if the file is missing)
require 'file_that_does_not_exist.php'; // Fatal error will occur here
echo "This line will not execute if the required file is missing.\n";
?>