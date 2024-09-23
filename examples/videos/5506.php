<?php

// Create or access a System V message queue
function createOrAccessQueue($key) {
    // Get a message queue identifier
    $queue = msg_get_queue($key, 0666 | IPC_CREAT);
    
    if (!$queue) {
        die("Failed to get message queue.");
    }
    
    return $queue;
}

// Send a message to the queue
function sendMessage($queue, $message) {
    $success = msg_send($queue, 1, $message, false, false, $errorCode);
    
    if (!$success) {
        die("Failed to send message. Error code: $errorCode");
    }
}

// Receive a message from the queue
function receiveMessage($queue) {
    $success = msg_receive($queue, 1, $messageType, 1024, $message, true, MSG_IPC_NOWAIT, $errorCode);
    
    if (!$success) {
        die("Failed to receive message. Error code: $errorCode");
    }
    
    return $message;
}

// Example usage
$key = ftok(__FILE__, 'b'); // Unique key for the message queue
$queue = createOrAccessQueue($key);

// Sending a message
sendMessage($queue, 'Hello, World!');

// Receiving a message
$message = receiveMessage($queue);
echo "Received message: $message\n";

// Cleaning up
msg_remove_queue($queue);
?>