<?php

// Create a new socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    die("Unable to create socket: " . socket_strerror(socket_last_error()));
}

// Define the address and port
$address = '0.0.0.0';
$port = 8080;

// Create address info
$addrInfo = [
    'family' => AF_INET,
    'type' => SOCK_STREAM,
    'protocol' => SOL_TCP,
    'addr' => $address,
    'port' => $port
];

// Bind the socket to the address and port
if (socket_bind($socket, $address, $port) === false) {
    die("Unable to bind socket: " . socket_strerror(socket_last_error()));
}

// Listen for incoming connections
if (socket_listen($socket, 5) === false) {
    die("Unable to listen on socket: " . socket_strerror(socket_last_error()));
}

echo "Socket successfully bound to $address:$port and listening for connections.\n";

// Accept incoming connections
$clientSocket = socket_accept($socket);

if ($clientSocket === false) {
    die("Unable to accept incoming connection: " . socket_strerror(socket_last_error()));
}

// Handle client communication
$input = socket_read($clientSocket, 1024);
echo "Received data: $input\n";

// Close the client and server sockets
socket_close($clientSocket);
socket_close($socket);

?>