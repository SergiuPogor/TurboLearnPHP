<?php

// Example: Dynamically changing message queue permissions and using sysvmsg for inter-process communication

// Create or connect to an existing message queue
$key = ftok('/tmp/test/input.txt', 'A'); // Unique queue key
$queue = msg_get_queue($key);

// Check if queue exists
if (!$queue) {
    throw new Exception("Could not create message queue");
}

// Function to set dynamic permissions for the message queue
function update_queue_permissions($queue, $permissions) {
    $status = msg_set_queue($queue, ['msg_perm.mode' => $permissions]);
    
    if (!$status) {
        throw new Exception("Failed to set message queue permissions");
    }
}

// Update queue permissions based on runtime conditions
$hour = date('G');
if ($hour >= 9 && $hour <= 17) {
    // Allow full read/write during office hours
    update_queue_permissions($queue, 0666);
} else {
    // Restrict access after hours
    update_queue_permissions($queue, 0444);
}

// Function to send a message with priority based on role
function send_priority_message($queue, $message, $priority = 1) {
    $status = msg_send($queue, $priority, $message, true);
    
    if (!$status) {
        throw new Exception("Failed to send message to queue");
    }
}

// Function to receive a message from the queue
function receive_message($queue, &$message, $desired_priority = 0) {
    $status = msg_receive($queue, $desired_priority, $received_priority, 1024, $message);
    
    if (!$status) {
        throw new Exception("Failed to receive message from queue");
    }
    return $received_priority;
}

// Example: Admin sends a high-priority message, while others use a normal priority
send_priority_message($queue, "Urgent system update!", 1); // High-priority message
send_priority_message($queue, "Regular user log-in", 3);    // Lower-priority message

// Check message queue stats
$queue_stats = msg_stat_queue($queue);
print_r($queue_stats);

// Simulate receiving messages in order of priority
$received_message = null;
$priority = receive_message($queue, $received_message);
echo "Received message with priority $priority: $received_message\n";

// Multiple ways to dynamically manage queue:
// 1. Batch process: Adjust permissions at intervals or based on app state.
// 2. Priority-based: Use different permissions based on message urgency.
// 3. Security: Temporarily restrict or open access without restarting the app.

// Clean up: Optionally remove queue after use to free resources
if (isset($_GET['cleanup'])) {
    msg_remove_queue($queue);
    echo "Queue removed successfully!";
}

?>