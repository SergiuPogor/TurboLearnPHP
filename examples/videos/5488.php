<?php

// Example 1: Creating a shared memory block and using shmop_size() to get its size

$key = ftok('/tmp/test/input.txt', 't'); // Generate a system-wide unique key
$shm_id = shmop_open($key, "c", 0644, 1024); // Create shared memory block with a size of 1024 bytes

if ($shm_id === false) {
    die("Failed to create shared memory segment.\n");
}

$size = shmop_size($shm_id); // Get the size of the shared memory block
echo "Size of shared memory segment: $size bytes\n";

shmop_close($shm_id); // Close the shared memory segment

// Example 2: Writing to shared memory, checking size before and after

$shm_id = shmop_open($key, "c", 0644, 2048); // Increase block size to 2048 bytes

if ($shm_id === false) {
    die("Failed to create shared memory segment.\n");
}

$initial_size = shmop_size($shm_id); // Check initial size
echo "Initial size: $initial_size bytes\n";

$data = "Hello, shared memory!";
shmop_write($shm_id, $data, 0); // Write data to the shared memory block

$used_size = strlen($data);
echo "Used size after writing data: $used_size bytes\n";

$current_size = shmop_size($shm_id); // Check current size
echo "Current size after writing: $current_size bytes\n";

shmop_close($shm_id); // Close shared memory

// Example 3: Dynamic memory handling based on shmop_size()

$shm_id = shmop_open($key, "c", 0644, 512); // Start with a small shared memory block

if ($shm_id === false) {
    die("Failed to create shared memory segment.\n");
}

$current_size = shmop_size($shm_id);
echo "Initial shared memory size: $current_size bytes\n";

$large_data = str_repeat('A', 1024); // Data that exceeds current memory size
if (strlen($large_data) > $current_size) {
    echo "Warning: Data size exceeds current shared memory size!\n";
    shmop_delete($shm_id); // Delete current memory block
    shmop_close($shm_id); // Close existing block

    // Recreate shared memory with larger size
    $shm_id = shmop_open($key, "c", 0644, 2048);
    echo "Shared memory size increased to: " . shmop_size($shm_id) . " bytes\n";
    shmop_write($shm_id, $large_data, 0); // Write large data
}

shmop_close($shm_id); // Final close of shared memory segment

// Note: Always validate memory operations to prevent memory leaks or data corruption.
?>