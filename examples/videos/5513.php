<?php

// Check if readline extension is loaded
if (!extension_loaded('readline')) {
    die('Readline extension is not available.');
}

// Define the history file
$historyFile = '/tmp/cli_history.txt';

// Load history from the file if it exists
if (file_exists($historyFile)) {
    readline_read_history($historyFile);
}

// Function to handle command autocompletion
function commandAutocomplete($input, $index) {
    $commands = ['help', 'exit', 'list', 'clear'];
    $matches = [];

    foreach ($commands as $command) {
        if (strpos($command, $input) === 0) {
            $matches[] = $command;
        }
    }

    return $matches;
}

// Register the autocomplete function
readline_completion_function('commandAutocomplete');

// Main loop to read commands
while (true) {
    // Simulate command-line prompt
    $input = readline("Enter command> ");

    if ($input === false) { // End of input
        break;
    }

    // Trim and add the input command to history
    $input = trim($input);
    if ($input !== '') {
        readline_add_history($input);
    }

    // Simple command execution
    switch ($input) {
        case 'help':
            echo "Available commands: help, exit, list, clear\n";
            break;
        case 'exit':
            echo "Exiting the program...\n";
            break 2; // Exit the loop
        case 'list':
            echo "Listing all available commands...\n";
            echo implode(", ", ['help', 'exit', 'list', 'clear']) . "\n";
            break;
        case 'clear':
            readline_clear_history();
            echo "History cleared.\n";
            break;
        default:
            echo "Unknown command: $input\n";
    }

    // Retrieve and display the entire history
    echo "Command History:" . PHP_EOL;
    $history = readline_list_history();
    foreach ($history as $index => $cmd) {
        echo "$index: $cmd" . PHP_EOL;
    }
}

// Save the command history to a file
readline_write_history($historyFile);
echo "Command history saved to $historyFile\n";

?>

