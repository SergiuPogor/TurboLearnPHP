<?php
// File: /tmp/test/memory_management.php

// Function to demonstrate memory usage
function displayMemoryUsage() {
    // Get current memory usage
    $memoryUsage = memory_get_usage();
    echo "Current memory usage: " . $memoryUsage . " bytes\n";

    // Set a memory limit
    ini_set('memory_limit', '128M');
    
    // Check and display memory limit
    $memoryLimit = ini_get('memory_limit');
    echo "Memory limit set to: " . $memoryLimit . "\n";

    // Example of potential memory leak
    $array = [];
    for ($i = 0; $i < 100000; $i++) {
        $array[] = str_repeat('A', 1024); // Allocate 1 KB per iteration
    }

    // Check memory usage after allocation
    $afterAllocation = memory_get_usage();
    echo "Memory usage after allocation: " . $afterAllocation . " bytes\n";

    // Clear the array to free memory
    unset($array);
    
    // Check memory usage after clearing
    $afterClearing = memory_get_usage();
    echo "Memory usage after clearing: " . $afterClearing . " bytes\n";
}

// Run the memory usage demonstration
displayMemoryUsage();
?>