<?php

// Create a new shared memory segment
$shmKey = ftok(__FILE__, 't'); // Generate a key
$shmId = shmop_open($shmKey, "c", 0644, 100);

// Check if the shared memory segment was created successfully
if (!$shmId) {
    die("Couldn't create shared memory segment\n");
}

// Prepare some data to store
$data = [
    'user_id' => 101,
    'user_name' => 'JohnDoe',
    'email' => 'john@example.com'
];

// Store the data in shared memory using shm_put_var
shmop_write($shmId, serialize($data), 0);

// Retrieve the data back using shm_get_var
$retrievedData = shmop_read($shmId, 0, shmop_size($shmId));
$unserializedData = unserialize($retrievedData);

// Display the retrieved data
echo "User ID: " . $unserializedData['user_id'] . PHP_EOL;
echo "User Name: " . $unserializedData['user_name'] . PHP_EOL;
echo "Email: " . $unserializedData['email'] . PHP_EOL;

// Clean up shared memory
shmop_delete($shmId);
shmop_close($shmId);
?>