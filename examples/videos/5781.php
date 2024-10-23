<?php

// Signal handler function
function signalHandler($signal)
{
    switch ($signal) {
        case SIGTERM:
            echo "Received SIGTERM, terminating...\n";
            exit;
        case SIGUSR1:
            echo "Received SIGUSR1, processing...\n";
            break;
    }
}

// Setting signal handlers
pcntl_signal(SIGTERM, "signalHandler");
pcntl_signal(SIGUSR1, "signalHandler");

// Forking the process
$pid = pcntl_fork();

if ($pid == -1) {
    die('Could not fork');
} elseif ($pid) {
    // Parent process
    echo "Parent process (PID: " . getmypid() . ") waiting for signals...\n";
    $status = null;

    // Wait for child process signals with timeout
    while (true) {
        // Check for any signals sent to the parent process
        $result = pcntl_sigtimedwait([SIGTERM, SIGUSR1], $status, 5);
        
        if ($result === -1) {
            // If no signal is received within the timeout, continue
            continue;
        }

        // Handle received signals
        if ($result > 0) {
            echo "Parent process received signal: $result\n";
        }
    }
} else {
    // Child process
    echo "Child process (PID: " . getmypid() . ") running...\n";
    sleep(3); // Simulating work
    posix_kill(getppid(), SIGUSR1); // Sending SIGUSR1 to parent
    sleep(2); // Simulating more work
    posix_kill(getppid(), SIGTERM); // Sending SIGTERM to parent
    exit;
}

?>