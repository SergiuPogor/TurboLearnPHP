<?php

// Example showing eval() vs include() in PHP

// 1. Using eval() to execute dynamic PHP code (be cautious with untrusted input)
$code = 'echo "Hello from dynamic code!";';
eval($code);  // Executes the string as PHP code

// 2. Using include() to include external PHP files
// Assume 'dynamic_file.php' contains PHP code like: echo "Hello from included file!";
include 'dynamic_file.php';

// A safer approach: Only use eval with trusted input
$trusted_code = 'echo "Safe dynamic execution";';
eval($trusted_code);  // It's important to sanitize input before using eval
?>