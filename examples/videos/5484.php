<?php

// Scenario: A PHP script to manage message queues for an inter-process communication system

$key = ftok('/tmp/test/input.txt', 'a'); // Generate a unique key using a file

// Example 1: Check if a message queue with the specific key already exists
if (msg_queue_exists($key)) {
    echo "Message queue with key $key already exists.\n";
    $queue = msg_get_queue($key);
} else {
    echo "No existing message queue with key $key. Creating a new one.\n";
    $queue = msg_get_queue($key, 0666 | IPC_CREAT);
}

// Example 2: Send a message to the existing or newly created queue
$message = [
    'type' => 1,
    'text' => 'Hello, this is a test message from the parent process.'
];

if (!msg_send($queue, $message['type'], $message['text'])) {
    echo "Failed to send message to the queue.\n";
} else {
    echo "Message successfully sent to the queue.\n";
}

// Example 3: Forking a child process to read messages from the queue
$pid = pcntl_fork();

if ($pid == -1) {
    die("Failed to fork process.\n");
} elseif ($pid === 0) {
    // Child process: receive a message
    $receivedMessage = null;
    if (msg_receive($queue, 0, $messageType, 1024, $receivedMessage, true, 0, $error)) {
        echo "Child process received message: $receivedMessage\n";
    } else {
        echo "Failed to receive message in child process. Error code: $error\n";
    }
    exit(0);
} else {
    // Parent process: wait for child process to finish
    pcntl_wait($status);
}

// Example 4: Check queue statistics
$queueStats = msg_stat_queue($queue);
echo "Current number of messages in the queue: " . $queueStats['msg_qnum'] . "\n";

// Example 5: Remove the message queue (cleanup)
if (msg_remove_queue($queue)) {
    echo "Message queue successfully removed.\n";
} else {
    echo "Failed to remove message queue.\n";
}

// Example 6: Error handling when using msg_queue_exists()
$invalidKey = -1; // Invalid key for demonstration
if (!msg_queue_exists($invalidKey)) {
    echo "Message queue does not exist for invalid key.\n";
} else {
    echo "Unexpected: message queue exists for invalid key.\n";
}

// Additional example: Handling queue capacity
for ($i = 0; $i < 5; $i++) {
    $message['text'] = "Message $i for queue capacity test.";
    if (!msg_send($queue, $message['type'], $message['text'])) {
        echo "Failed to send message $i due to queue capacity limit.\n";
    }
}

?>