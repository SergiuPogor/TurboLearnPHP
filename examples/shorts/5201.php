<?php
// Start output buffering
ob_start();

// Output initial content
echo "Starting the process...";

// Flush the buffer and send the initial content to the browser
ob_flush();
flush();

// Simulate a long process
for ($i = 0; $i < 5; $i++) {
    // Output progress
    echo "Step $i completed.<br>";
    
    // Flush the buffer after each step
    ob_flush();
    flush();
    
    // Simulate a delay
    sleep(1);
}

// Final output
echo "Process completed.";
?>