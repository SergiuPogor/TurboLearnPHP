<?php
// Function to handle user input dynamically
function inputHandler($input) {
    // Process the user input
    if (trim($input) === 'exit') {
        echo "Exiting the application...\n";
        exit;
    }
    echo "You entered: $input\n";
}

// Register the callback handler
readline_callback_handler_install("Type 'exit' to quit.\n> ", 'inputHandler');

// Main loop
while (true) {
    // Get user input
    $input = readline();
    // Invoke the callback handler
    readline_callback_handler_install("Type 'exit' to quit.\n> ", 'inputHandler');
    // Call the input handler
    inputHandler($input);
}
?>