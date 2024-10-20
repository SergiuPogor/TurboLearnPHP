<?php
// Check if the System V shared memory extension is available
if (!extension_loaded('sysvshm')) {
    die("The sysvshm extension is not available.");
}

// Create a new shared memory segment
$key = ftok(__FILE__, 't'); // Generate a unique key
$shm_id = shmop_open($key, "c", 0644, 100); // Create a shared memory segment of 100 bytes

if ($shm_id === false) {
    die("Could not create shared memory segment.");
}

// Store data in shared memory
$data = "This is a test string stored in shared memory.";
$shmop_write = shmop_write($shm_id, $data, 0);
if ($shmop_write === false) {
    die("Could not write to shared memory.");
}

// Reading from shared memory
$shm_data = shmop_read($shm_id, 0, $shmop_write);
if ($shm_data === false) {
    die("Could not read from shared memory.");
}
echo "Data read from shared memory: " . $shm_data . "\n";

// Removing a variable from shared memory
if (shm_remove_var($shm_id, 0)) {
    echo "Variable removed from shared memory successfully.\n";
} else {
    echo "Failed to remove variable from shared memory.\n";
}

// Cleanup: close and delete the shared memory segment
if (shmop_close($shm_id) && shmop_delete($shm_id)) {
    echo "Shared memory segment closed and deleted.\n";
} else {
    echo "Failed to close and delete the shared memory segment.\n";
}
?>