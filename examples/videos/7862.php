<?php
// Increase the maximum execution time for the script
set_time_limit(300); // 300 seconds = 5 minutes

// Example function that simulates a long-running process
function longRunningProcess() {
    // Simulate a process that takes time
    for ($i = 0; $i < 10; $i++) {
        sleep(30); // Sleep for 30 seconds to simulate a time-consuming task
        echo "Completed iteration $i\n";
    }
}

// Call the long-running process
longRunningProcess();

// Check the current maximum execution time
$current_time_limit = ini_get('max_execution_time');
echo "Current max execution time is set to: $current_time_limit seconds\n";

// Optionally, adjust the time limit dynamically based on the task
if ($current_time_limit < 600) {
    ini_set('max_execution_time', 600); // Set to 10 minutes if less than that
    echo "Increased max execution time to 600 seconds\n";
}

// Ensure to handle script termination gracefully
register_shutdown_function(function() {
    if (error_get_last()) {
        echo "Script terminated due to an error.\n";
    } else {
        echo "Script completed successfully.\n";
    }
});
?>