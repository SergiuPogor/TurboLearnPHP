<?php

// Create a socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    die('Socket creation failed: ' . socket_strerror(socket_last_error()));
}

// Bind the socket to an address and port
$result = socket_bind($socket, '0.0.0.0', 8080);

if ($result === false) {
    die('Socket bind failed: ' . socket_strerror(socket_last_error($socket)));
}

// Listen for connections
$result = socket_listen($socket);

if ($result === false) {
    die('Socket listen failed: ' . socket_strerror(socket_last_error($socket)));
}

// Accept a connection
$client = socket_accept($socket);

if ($client === false) {
    die('Socket accept failed: ' . socket_strerror(socket_last_error($socket)));
}

// Check if data is at the mark
if (socket_atmark($client)) {
    echo "Data is at the mark and ready to be read." . PHP_EOL;
} else {
    echo "No data is at the mark yet." . PHP_EOL;
}

// Close sockets
socket_close($client);
socket_close($socket);

?>