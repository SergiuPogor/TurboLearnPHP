<?php
// Enable output buffering
ob_start();

// Function to simulate a page that outputs content
function sendHeaders() {
    // Simulating some output
    echo "This is some content before headers.";
    
    // Attempt to send headers after output
    header("Location: https://example.com"); // This will trigger an error if output is not buffered
}

// Call the function
sendHeaders();

// Flush the output buffer and turn off output buffering
ob_end_flush();
?>