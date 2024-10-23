<?php

// Step 1: Create a TCP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    die("Could not create socket: " . socket_strerror(socket_last_error()) . "\n");
}

// Step 2: Bind the socket to an address and port
$address = '127.0.0.1';
$port = 8080;
if (socket_bind($socket, $address, $port) === false) {
    die("Could not bind socket: " . socket_strerror(socket_last_error($socket)) . "\n");
}

// Step 3: Listen for incoming connections
if (socket_listen($socket, 5) === false) {
    die("Could not listen on socket: " . socket_strerror(socket_last_error($socket)) . "\n");
}

// Step 4: Accept a connection
$clientSocket = socket_accept($socket);
if ($clientSocket === false) {
    die("Could not accept connection: " . socket_strerror(socket_last_error($socket)) . "\n");
}

// Step 5: Export the socket to a stream
$stream = socket_export_stream($clientSocket);
if ($stream === false) {
    die("Could not export socket to stream: " . socket_strerror(socket_last_error($clientSocket)) . "\n");
}

// Step 6: Read data from the stream
$data = fread($stream, 1024);
if ($data === false) {
    die("Could not read from stream: " . socket_strerror(socket_last_error($clientSocket)) . "\n");
}
echo "Received: " . $data . "\n";

// Step 7: Send a response back to the client
$response = "Hello from the server!";
fwrite($stream, $response);

// Step 8: Close the stream and the sockets
fclose($stream);
socket_close($clientSocket);
socket_close($socket);
?>