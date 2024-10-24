<?php

// Create a UDP socket
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
if ($socket === false) {
    die("Error creating socket: " . socket_strerror(socket_last_error()));
}

// Prepare the message header and control data
$message = "Hello from PHP socket_sendmsg!";
$control = [
    ['level' => SOL_SOCKET, 'type' => SO_SNDBUF, 'data' => 8192]
];

$address = '127.0.0.1'; // Target address
$port = 8080; // Target port

// Create the message structure
$msgHdr = [
    'msg_name' => $address,
    'msg_namelen' => strlen($address),
    'msg_iov' => [[$message, strlen($message)]],
    'msg_control' => $control,
    'msg_controllen' => count($control),
];

// Send the message
$bytesSent = socket_sendmsg($socket, $msgHdr, 0);
if ($bytesSent === false) {
    die("Error sending message: " . socket_strerror(socket_last_error($socket)));
}

// Display the result
echo "Sent $bytesSent bytes to $address:$port\n";

// Cleanup
socket_close($socket);
?>