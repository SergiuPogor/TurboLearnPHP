<?php
// Example: Using posix_kill() to manage a child process

// First, we create a child process using pcntl_fork
$pid = pcntl_fork();

if ($pid == -1) {
    // If fork fails
    die("Error: Could not fork process.\n");
} elseif ($pid) {
    // Parent process
    echo "Parent process. Child PID: $pid\n";

    // Wait for 3 seconds before sending a signal to the child process
    sleep(3);

    // Send SIGTERM (terminate) signal to the child process
    if (posix_kill($pid, SIGTERM)) {
        echo "Sent SIGTERM to child process with PID $pid.\n";
    } else {
        echo "Failed to send SIGTERM to child process.\n";
    }

    // Wait for child process to exit
    pcntl_wait($status);
    echo "Child process has exited. Status: $status\n";

} else {
    // Child process
    echo "Child process started. PID: " . getmypid() . "\n";

    // Register a signal handler for SIGTERM
    pcntl_signal(SIGTERM, function () {
        echo "Child process received SIGTERM, exiting...\n";
        exit(0);
    });

    // Keep the child process running indefinitely until it receives a signal
    while (true) {
        echo "Child process running...\n";
        sleep(1);
        // Dispatch any pending signals
        pcntl_signal_dispatch();
    }
}

// Example: Sending a SIGHUP to reload configuration
$childPid = posix_getpid();

if ($childPid) {
    echo "Sending SIGHUP to process $childPid to reload configuration...\n";
    if (posix_kill($childPid, SIGHUP)) {
        echo "SIGHUP sent successfully.\n";
    } else {
        echo "Failed to send SIGHUP.\n";
    }
}

// Example: Terminating a process with custom cleanup
function terminateProcess($pid)
{
    echo "Terminating process $pid...\n";
    if (posix_kill($pid, SIGTERM)) {
        echo "Termination signal sent to $pid.\n";
    } else {
        echo "Failed to terminate process $pid.\n";
    }
}

// Using terminateProcess function to gracefully shutdown a child process
terminateProcess($pid);

// Edge case: Checking if a process still exists before sending a signal
if (posix_kill($pid, 0)) {
    echo "Process $pid is still running. Attempting to terminate...\n";
    posix_kill($pid, SIGTERM);
} else {
    echo "Process $pid does not exist or is not running.\n";
}
?>