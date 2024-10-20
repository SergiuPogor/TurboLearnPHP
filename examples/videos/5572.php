<?php

// Example: Using pcntl_signal_dispatch() to handle signals in a PHP script

declare(ticks = 1); // Enable signal handling

// Define a signal handler
function signalHandler($signal) {
    switch ($signal) {
        case SIGTERM:
            echo "Caught SIGTERM! Exiting gracefully..." . PHP_EOL;
            exit;
        case SIGUSR1:
            echo "Caught SIGUSR1! Performing a task..." . PHP_EOL;
            // Perform some task here
            break;
        case SIGUSR2:
            echo "Caught SIGUSR2! Performing a different task..." . PHP_EOL;
            // Perform another task here
            break;
    }
}

// Register the signal handler
pcntl_signal(SIGTERM, "signalHandler");
pcntl_signal(SIGUSR1, "signalHandler");
pcntl_signal(SIGUSR2, "signalHandler");

// Simulate a long-running process
echo "Process started. PID: " . getmypid() . PHP_EOL;

while (true) {
    // Dispatch signals
    pcntl_signal_dispatch();
    
    // Simulate doing some work
    echo "Working... (PID: " . getmypid() . ")" . PHP_EOL;
    sleep(2);
}

// Clean up if needed
// pcntl_signal(SIGTERM, SIG_DFL); // Reset to default signal handler

?>