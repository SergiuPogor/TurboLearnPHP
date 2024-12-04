<?php
// Example 1: Using microtime() for benchmarking (less accurate)
$start = microtime(true);
usleep(500000); // Sleep for 500 milliseconds
$end = microtime(true);
$execution_time = $end - $start;
echo "Execution time (microtime): $execution_time seconds\n";

// Example 2: Using hrtime() for benchmarking (more accurate)
$start = hrtime(true);
usleep(500000); // Sleep for 500 milliseconds
$end = hrtime(true);
$execution_time_ns = $end - $start;
$execution_time_sec = $execution_time_ns / 1e9; // Convert nanoseconds to seconds
echo "Execution time (hrtime): $execution_time_sec seconds\n";
?>