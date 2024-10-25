<?php

class MyThread extends Thread {
    private $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function run() {
        // Simulate a task by sleeping for a random time
        $sleepTime = rand(1, 5);
        sleep($sleepTime);
        echo "Thread {$this->number} completed after {$sleepTime} seconds.\n";
    }
}

// Create an array to hold threads
$threads = [];

// Start multiple threads
for ($i = 1; $i <= 5; $i++) {
    $threads[$i] = new MyThread($i);
    $threads[$i]->start();
}

// Wait for all threads to finish
foreach ($threads as $thread) {
    $thread->join();
}

echo "All threads have completed.\n";
?>