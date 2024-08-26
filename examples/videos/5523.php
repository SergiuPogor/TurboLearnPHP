<?php

// Create or open a semaphore
$semaphoreKey = ftok(__FILE__, 'a'); // Generate a unique key
$semaphore = sem_get($semaphoreKey, 1); // Create or open semaphore with 1 permit

if ($semaphore === false) {
    throw new RuntimeException('Unable to create or access semaphore.');
}

// Acquire the semaphore
if (sem_acquire($semaphore)) {
    // Critical section: perform operations requiring synchronization
    echo "Semaphore acquired successfully.\n";
    
    // Simulate some work
    sleep(2);
    
    // Release the semaphore
    sem_release($semaphore);
    echo "Semaphore released successfully.\n";
} else {
    throw new RuntimeException('Unable to acquire semaphore.');
}

?>