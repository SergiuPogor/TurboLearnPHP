<?php
// This script demonstrates the use of posix_mkfifo()
// to create a named pipe for inter-process communication.

$pipe_name = '/tmp/test/my_named_pipe';

// Create a named pipe using posix_mkfifo()
if (posix_mkfifo($pipe_name, 0666) === false) {
    die("Failed to create named pipe: $pipe_name\n");
}

// Open the named pipe for reading
$pipe = fopen($pipe_name, 'r');

// Start a new process that writes to the pipe
if (pcntl_fork() == 0) {
    // Child process: write to the pipe
    $data_to_send = "Hello from the child process!";
    $pipe_writer = fopen($pipe_name, 'w');
    fwrite($pipe_writer, $data_to_send);
    fclose($pipe_writer);
    exit(0); // Terminate the child process
}

// Parent process: read from the pipe
echo "Waiting for data from the named pipe...\n";
$data_received = fread($pipe, 256); // Read 256 bytes from the pipe
echo "Received: $data_received\n";

// Close the pipe
fclose($pipe);

// Clean up by removing the named pipe
unlink($pipe_name);
?>