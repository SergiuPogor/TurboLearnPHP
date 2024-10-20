<?php

// Create a TCP/IP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    die("Failed to create socket: " . socket_strerror(socket_last_error()));
}

// Connect to a server
$serverIp = '127.0.0.1'; // Change to your server's IP
$serverPort = 8080;
if (socket_connect($socket, $serverIp, $serverPort) === false) {
    die("Failed to connect: " . socket_strerror(socket_last_error($socket)));
}

// Send data to the server
$message = "Hello, Server!";
if (socket_write($socket, $message, strlen($message)) === false) {
    die("Failed to send data: " . socket_strerror(socket_last_error($socket)));
}

// Receive response from the server
$response = socket_read($socket, 2048);
echo "Server response: $response\n";

// Properly close the socket
if (socket_close($socket) === false) {
    die("Failed to close socket: " . socket_strerror(socket_last_error($socket)));
}

// Advanced usage: handling multiple connections
function handleClient($clientSocket) {
    // Read client data
    $clientMessage = socket_read($clientSocket, 2048);
    echo "Received from client: $clientMessage\n";

    // Send response back to client
    $responseMessage = "Message received.";
    socket_write($clientSocket, $responseMessage, strlen($responseMessage));

    // Close the client socket
    socket_close($clientSocket);
}

// Set up a server to handle incoming connections
$serverSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($serverSocket, $serverIp, $serverPort);
socket_listen($serverSocket);

while (true) {
    // Accept a client connection
    $clientSocket = socket_accept($serverSocket);
    if ($clientSocket !== false) {
        handleClient($clientSocket);
    }
}

// Close server socket when done
socket_close($serverSocket);

?>