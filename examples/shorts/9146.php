<?php

// Start output buffering
ob_start();

// Generate some dynamic content
echo "<h1>Welcome to My Site!</h1>";
echo "<p>Here is some dynamic content:</p>";

// Capture the output
$content = ob_get_contents();

// Clean (erase) the output buffer and end buffering
ob_end_clean();

// Modify the content if needed
$content .= "<p>This content was added after output buffering!</p>";

// Send the modified content to the browser
echo $content;

// Example of error handling with output buffering
function riskyFunction() {
    // Start output buffering for error capture
    ob_start();
    // Intentionally causing an error
    echo $undefinedVariable; // Notice: Undefined variable
    // Capture any errors and clean the buffer
    $errorOutput = ob_get_clean();
    
    if ($errorOutput) {
        // Log the error instead of displaying it
        error_log("Captured error: " . $errorOutput);
        echo "<p>An error occurred, but we've logged it.</p>";
    }
}

// Call the function to demonstrate error handling
riskyFunction();