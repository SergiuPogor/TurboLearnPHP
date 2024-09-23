<?php

// Define shared memory key and size
$shmKey = ftok(__FILE__, 'b'); // Generate a unique key for shared memory
$shmSize = 1024; // Size of the shared memory segment

// Attach to shared memory segment
$shmId = shm_attach($shmKey, $shmSize, 0666); // Read and write permissions

if ($shmId === false) {
    throw new RuntimeException('Unable to attach to shared memory segment.');
}

// Write data to shared memory
$dataToWrite = "Hello, Shared Memory!";
shm_put_var($shmId, 1, $dataToWrite); // Store data with key 1

// Read data from shared memory
if (shm_has_var($shmId, 1)) {
    $dataRead = shm_get_var($shmId, 1);
    echo "Data read from shared memory: $dataRead\n";
}

// Clean up shared memory
shm_remove($shmId);
?>