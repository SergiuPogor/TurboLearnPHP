<?php

// Scenario: A PHP script to monitor child processes and their parent process group ID

// Function to log process details
function logProcessDetails($pid) {
    $pgid = posix_getpgid($pid);
    
    // Check if posix_getpgid() returned a valid result
    if ($pgid !== false) {
        echo "Process ID: $pid belongs to Process Group ID: $pgid\n";
    } else {
        echo "Failed to retrieve Process Group ID for Process ID: $pid\n";
    }
}

// Example 1: Get the PGID of the current script
$currentPid = posix_getpid();
logProcessDetails($currentPid);

// Example 2: Forking a new child process and getting its PGID
$pid = pcntl_fork();

if ($pid == -1) {
    // Forking failed
    die("Failed to fork a new process.\n");
} elseif ($pid) {
    // Parent process
    echo "Parent process, PID: $currentPid\n";
    logProcessDetails($pid); // Check child process PGID
} else {
    // Child process
    $childPid = posix_getpid();
    echo "Child process started, PID: $childPid\n";
    
    // Simulate some processing in child
    sleep(5);
    logProcessDetails($childPid); // Check own PGID
    exit(0); // Terminate child process
}

// Example 3: Managing multiple child processes
$childPids = [];
for ($i = 0; $i < 3; $i++) {
    $pid = pcntl_fork();
    if ($pid == 0) {
        // Child process
        echo "Child process (batch), PID: " . posix_getpid() . "\n";
        sleep(2);
        exit(0);
    } else {
        // Parent process
        $childPids[] = $pid;
    }
}

// Wait for child processes to finish
foreach ($childPids as $childPid) {
    pcntl_waitpid($childPid, $status);
    logProcessDetails($childPid);
}

// Example 4: Verifying the PGID of an external process
$externalProcessPid = 1234; // Replace with an actual process ID
logProcessDetails($externalProcessPid);

// Example 5: Changing the PGID of the current process
$newGid = 5000;
if (posix_setpgid($currentPid, $newGid) === false) {
    echo "Failed to change PGID for the current process.\n";
} else {
    echo "Successfully changed PGID to $newGid for the current process.\n";
    logProcessDetails($currentPid);
}

?>