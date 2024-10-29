<?php
// Example of profiling a PHP application using Xdebug and Blackfire

// Step 1: Enable Xdebug in your php.ini file
// [Xdebug]
// zend_extension=xdebug.so
// xdebug.profiler_enable=1
// xdebug.profiler_output_dir="/tmp/test"

// Simulate a slow function
function slowFunction() {
    sleep(2); // Simulating a slow process
    return "Done!";
}

// Step 2: Call the function to profile
echo slowFunction(); // Call the function to see the output

// Step 3: Analyze the generated Xdebug cachegrind files
// You can use a tool like Webgrind to visualize the profiling data

// Using Blackfire (make sure you have it installed and set up)

// Step 4: Profile the same function with Blackfire
// $blackfire = new Blackfire\Client();
// $probe = $blackfire->probe();
// $probe->start();
// echo slowFunction();
// $probe->stop();
// $blackfire->send($probe); // Send the probe data to Blackfire
?>