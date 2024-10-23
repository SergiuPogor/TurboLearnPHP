<?php

// Example 1: Basic socket connection and data writing

// Create a TCP/IP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    die("Unable to create socket: " . socket_strerror(socket_last_error()));
}

// Connect to a server
$address = '127.0.0.1';
$port = 8080;
if (socket_connect($socket, $address, $port) === false) {
    die("Unable to connect to server: " . socket_strerror(socket_last_error($socket)));
}

// Data to send
$message = "Hello, Server!";

// Send data to the socket
$bytes_written = socket_write($socket, $message, strlen($message));
if ($bytes_written === false) {
    die("Unable to send data: " . socket_strerror(socket_last_error($socket)));
}

// Example 2: Handling socket write failures
if ($bytes_written !== strlen($message)) {
    echo "Warning: Only $bytes_written bytes were sent out of " . strlen($message) . " bytes.";
}

// Example 3: Sending multiple messages in a loop
$messages = ["First message", "Second message", "Third message"];
foreach ($messages as $msg) {
    $bytes_written = socket_write($socket, $msg, strlen($msg));
    if ($bytes_written === false) {
        echo "Error sending message: " . socket_strerror(socket_last_error($socket));
    } else {
        echo "Sent $bytes_written bytes: '$msg'\n";
    }
}

// Example 4: Closing the socket
socket_close($socket);

// Example 5: Implementing a simple non-blocking write
socket_set_nonblock($socket);
$message = "Non-blocking message";

$bytes_written = socket_write($socket, $message, strlen($message));
if ($bytes_written === false) {
    if (socket_last_error($socket) === SOCKET_EAGAIN) {
        echo "Socket is busy, try again later.\n";
    } else {
        echo "Error: " . socket_strerror(socket_last_error($socket)) . "\n";
    }
}

// Example 6: Checking if socket is writable before writing
$read = [];
$write = [$socket];
$except = null;
if (socket_select($read, $write, $except, 0) > 0) {
    // Only write if the socket is writable
    if (in_array($socket, $write)) {
        $bytes_written = socket_write($socket, "Another message", strlen("Another message"));
        if ($bytes_written === false) {
            echo "Failed to write data: " . socket_strerror(socket_last_error($socket));
        }
    }
}

?>