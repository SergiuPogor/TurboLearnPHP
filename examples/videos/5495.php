<?php

// Define the shared memory key and size
$shm_key = ftok(__FILE__, 't');
$shm_size = 1024;

// Create or open a shared memory segment
$shm_id = shmop_open($shm_key, 'c', 0644, $shm_size);
if (!$shm_id) {
    die("Unable to create or open shared memory segment.");
}

// Write data to the shared memory segment
$data = "Hello from shared memory!";
$written = shmop_write($shm_id, $data, 0);
if ($written === false) {
    die("Unable to write data to shared memory.");
}

// Read data from the shared memory segment
$shm_data = shmop_read($shm_id, 0, $shm_size);
if ($shm_data === false) {
    die("Unable to read data from shared memory.");
}

// Display the data read from shared memory
echo "Data read from shared memory: $shm_data\n";

// Close and delete the shared memory segment
shmop_close($shm_id);
shmop_delete($shm_id);

?>