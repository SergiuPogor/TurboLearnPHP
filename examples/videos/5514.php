<?php

// Check if the System V message extension is available
if (!extension_loaded('sysvmsg')) {
    die('The sysvmsg extension is not available.');
}

// Create or get a message queue
$queueKey = ftok(__FILE__, 'a'); // Unique identifier for the queue
$queue = msg_get_queue($queueKey);

// Define the message type and size
$messageType = 1;
$maxSize = 256;

// Receive a message from the queue
if (msg_receive($queue, $messageType, $receivedType, $maxSize, $message, true, MSG_IPC_NOWAIT)) {
    echo "Message received: $message" . PHP_EOL;
} else {
    echo "No message received or error occurred." . PHP_EOL;
}

// Optionally, send a message to the queue for testing
$msg = "Hello, IPC!";
msg_send($queue, $messageType, $msg);

// Check if message sending was successful
if (msg_send($queue, $messageType, $msg)) {
    echo "Message sent successfully." . PHP_EOL;
} else {
    echo "Failed to send message." . PHP_EOL;
}

// Clean up the message queue
msg_remove_queue($queue);

?>