<?php

// A script demonstrating the use of socket_setopt() in PHP
// This example creates a socket, sets options, and handles connections

// Create a TCP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    die("Unable to create socket: " . socket_strerror(socket_last_error()));
}

// Set socket options
$timeout = ['sec' => 5, 'usec' => 0];
if (socket_setopt($socket, SOL_SOCKET, SO_RCVTIMEO, $timeout) === false) {
    die("Unable to set receive timeout: " . socket_strerror(socket_last_error($socket)));
}

if (socket_setopt($socket, SOL_SOCKET, SO_SNDTIMEO, $timeout) === false) {
    die("Unable to set send timeout: " . socket_strerror(socket_last_error($socket)));
}

// Set the buffer size
$bufferSize = 8192;
if (socket_setopt($socket, SOL_SOCKET, SO_RCVBUF, $bufferSize) === false) {
    die("Unable to set receive buffer size: " . socket_strerror(socket_last_error($socket)));
}

// Bind the socket to a port
$host = '127.0.0.1';
$port = 8080;
if (socket_bind($socket, $host, $port) === false) {
    die("Unable to bind socket: " . socket_strerror(socket_last_error($socket)));
}

// Listen for incoming connections
if (socket_listen($socket, 5) === false) {
    die("Unable to listen on socket: " . socket_strerror(socket_last_error($socket)));
}

// Accept a connection
$client = socket_accept($socket);
if ($client === false) {
    die("Unable to accept connection: " . socket_strerror(socket_last_error($socket)));
}

// Read from the client
$request = socket_read($client, 2048);
echo "Received request: $request";

// Respond to the client
$response = "Hello, Client!";
socket_write($client, $response, strlen($response));

// Close the sockets
socket_close($client);
socket_close($socket);