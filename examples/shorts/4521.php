<?php

// Example of PHP multithreading using pthreads

// Define a worker class that extends Thread
class Worker extends Thread {
    public function __construct($threadId) {
        $this->threadId = $threadId;
    }

    public function run() {
        echo "Thread {$this->threadId} started\n";
        sleep(2); // Simulate some work
        echo "Thread {$this->threadId} completed\n";
    }
}

// Create multiple threads
$threads = [];
for ($i = 1; $i <= 3; $i++) {
    $threads[$i] = new Worker($i);
    $threads[$i]->start();
}

// Wait for all threads to finish
foreach ($threads as $thread) {
    $thread->join();
}

?>