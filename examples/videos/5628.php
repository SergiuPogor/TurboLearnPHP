<?php

// Ensure the PCNTL extension is enabled
if (!function_exists('pcntl_fork')) {
    die("PCNTL extension is not available");
}

// Function to handle signals
function signalHandler($signo) {
    switch ($signo) {
        case SIGTERM:
        case SIGINT:
            echo "Process terminated.\n";
            exit;
            break;
    }
}

// Set the signal handler
pcntl_signal(SIGTERM, "signalHandler");
pcntl_signal(SIGINT, "signalHandler");

// Fork the process
$pid = pcntl_fork();

if ($pid == -1) {
    die("Could not fork the process.");
} elseif ($pid) {
    // Parent process
    echo "Parent process: waiting for child to terminate...\n";
    $status = null;
    // Wait for child process
    $childPid = pcntl_wait($status);
    
    // Check if the child was terminated by a signal
    if (pcntl_wifsignaled($status)) {
        $signo = pcntl_wtermsig($status);
        echo "Child process ($childPid) was terminated by signal: $signo\n";
    } else {
        echo "Child process ($childPid) terminated normally.\n";
    }
} else {
    // Child process
    echo "Child process is running...\n";
    // Simulating work by sleeping for a few seconds
    sleep(5);
    // Uncomment to test signal handling
    // posix_kill(getppid(), SIGTERM);
    exit(0);
}

?>