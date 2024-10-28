<?php

// Solution 1: Check for any whitespace or output before calling header
if (!headers_sent()) {
    header('Location: /tmp/test/success.php');
} else {
    echo "Headers already sent; redirection failed.";
}

// Solution 2: Use Output Buffering to control when headers are sent
ob_start(); // Start output buffering

// Some HTML content that won’t affect headers due to buffering
echo "<!-- Debug message or HTML content that won’t break headers -->";

// Now safely call the header function
header('Location: /tmp/test/dashboard.php');
ob_end_flush(); // Send output to the browser

// Solution 3: Ensure no unwanted output by setting error handler
function checkHeaders()
{
    if (headers_sent($file, $line)) {
        error_log("Headers sent in $file at line $line.");
        exit("Error: Headers sent prematurely.");
    }
}
checkHeaders();
header('Content-Type: application/json');

// Solution 4: Multiple header calls with safe conditionals
if (!headers_sent()) {
    header('X-Powered-By: PHP Debug');
    header('Cache-Control: no-cache, no-store, must-revalidate');
}

?>