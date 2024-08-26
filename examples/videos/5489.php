<?php

// Example 1: Basic usage of pcntl_wtermsig() to capture signal termination

$pid = pcntl_fork(); // Fork a child process

if ($pid == -1) {
    die("Failed to fork process.\n");
} elseif ($pid) {
    // Parent process: wait for child to finish
    pcntl_wait($status);

    // Check if child was terminated by a signal
    if (pcntl_wifsignaled($status)) {
        $signal = pcntl_wtermsig($status); // Get signal number that terminated the child
        echo "Child process was terminated by signal: $signal\n";
    } else {
        echo "Child process exited normally.\n";
    }
} else {
    // Child process: simulate a task and then kill itself with a signal
    sleep(2); // Simulate work
    posix_kill(getmypid(), SIGTERM); // Terminate child with SIGTERM
}

// Example 2: Handling multiple child processes and using pcntl_wtermsig()

for ($i = 0; $i < 3; $i++) {
    $pid = pcntl_fork();

    if ($pid == -1) {
        die("Failed to fork child $i.\n");
    } elseif ($pid) {
        // Parent process: continue to fork next child
        continue;
    } else {
        // Child process: simulate different signal termination
        sleep($i + 1); // Different sleep times
        $signals = [SIGTERM, SIGINT, SIGHUP];
        posix_kill(getmypid(), $signals[$i]); // Terminate with different signals
        exit(0);
    }
}

// Parent process: wait for all child processes
while (pcntl_wait($status) > 0) {
    if (pcntl_wifsignaled($status)) {
        $signal = pcntl_wtermsig($status);
        echo "A child process was terminated by signal: $signal\n";
    }
}

// Example 3: Monitoring signals in real-time with signal handlers

pcntl_async_signals(true); // Enable asynchronous signal handling

function handleSignal($signo) {
    echo "Caught signal: $signo\n";
    exit(0);
}

// Install signal handlers
pcntl_signal(SIGTERM, 'handleSignal');
pcntl_signal(SIGINT, 'handleSignal');

// Simulate a long-running process
while (true) {
    sleep(1); // Simulate ongoing work
    echo "Working...\n";
}

// Note: Use pcntl_wait() and signal handling with care in multi-threaded applications.
?>