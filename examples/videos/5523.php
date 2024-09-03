<?php

// Function to log messages
function logMessage($message) {
    echo "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
}

// Create or open a semaphore
$semaphoreKey = ftok(__FILE__, 'a'); // Generate a unique key based on the file
$semaphore = sem_get($semaphoreKey, 1); // Create or open a semaphore with 1 permit

if ($semaphore === false) {
    throw new RuntimeException('Unable to create or access semaphore.');
}

logMessage("Semaphore created or accessed successfully.");

// Shared resource (e.g., a file)
$sharedResourceFile = 'shared_resource.txt';

// Function to write to the shared resource safely
function writeToSharedResource($semaphore, $data) {
    if (sem_acquire($semaphore)) {
        logMessage("Semaphore acquired successfully.");

        // Critical section: perform operations requiring synchronization
        file_put_contents('shared_resource.txt', $data . PHP_EOL, FILE_APPEND);

        // Simulate some work
        sleep(2);

        // Release the semaphore
        sem_release($semaphore);
        logMessage("Semaphore released successfully.");
    } else {
        logMessage("Failed to acquire semaphore.");
        throw new RuntimeException('Unable to acquire semaphore.');
    }
}

// Example of using the semaphore for synchronizing access to a shared resource
try {
    writeToSharedResource($semaphore, "Data written by process 1");

    // Simulate another process attempting to access the shared resource
    if (sem_acquire($semaphore)) {
        logMessage("Semaphore acquired by another process.");

        // Simulate read operation
        $data = file_get_contents($sharedResourceFile);
        logMessage("Data read from shared resource: " . trim($data));

        // Release the semaphore
        sem_release($semaphore);
        logMessage("Semaphore released by another process.");
    } else {
        throw new RuntimeException('Unable to acquire semaphore for another process.');
    }
} catch (Exception $e) {
    logMessage("Error: " . $e->getMessage());
} finally {
    // Cleanup
    logMessage("Cleanup: Attempting to release semaphore if still acquired.");

    // Try to release the semaphore if it is still acquired
    if (!sem_release($semaphore)) {
        logMessage("Failed to release semaphore. Manual intervention may be required.");
    }

    // Remove the semaphore if it's no longer needed
    if (!sem_remove($semaphore)) {
        logMessage("Failed to remove semaphore.");
    } else {
        logMessage("Semaphore removed successfully.");
    }
}

?>

