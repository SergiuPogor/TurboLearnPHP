<?php

// Step 1: Create a connection to MySQL using mysqli
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check if connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Enable MySQL debugging
$mysqli->dump_debug_info();
echo "Debug info dumped for current MySQL session." . PHP_EOL;

// Step 3: Dump the debug info into a log file for later review
ob_start(); // Start output buffering
$mysqli->dump_debug_info();
$debugInfo = ob_get_clean(); // Get the buffer content and clean it

// Save the debug info to a log file
file_put_contents('/tmp/test/mysql_debug_info.log', $debugInfo);
echo "MySQL session debug info saved to file." . PHP_EOL;

// Step 4: Example of running a slow query to check performance issues
$query = "SELECT SLEEP(2);"; // Simulating a slow query
$result = $mysqli->query($query);

// Check if the query was successful
if ($result) {
    echo "Query executed successfully." . PHP_EOL;
    $mysqli->dump_debug_info(); // Dumping debug info again after the query
} else {
    echo "Query failed: " . $mysqli->error . PHP_EOL;
}

// Step 5: Save slow query debug info into another file for further analysis
ob_start();
$mysqli->dump_debug_info();
$slowQueryDebugInfo = ob_get_clean();
file_put_contents('/tmp/test/mysql_slow_query_debug.log', $slowQueryDebugInfo);

// Step 6: Combining multiple dumps for a comprehensive log
$fullDebugLog = $debugInfo . PHP_EOL . $slowQueryDebugInfo;
file_put_contents('/tmp/test/full_debug_log.log', $fullDebugLog);
echo "Combined debug log saved to file." . PHP_EOL;

// Step 7: Error handling when dumping debug info
try {
    $mysqli->dump_debug_info();
} catch (Exception $e) {
    echo "Failed to dump debug info: " . $e->getMessage() . PHP_EOL;
}

// Step 8: Closing the MySQL connection and re-checking debug info
$mysqli->close();
$mysqli = new mysqli("localhost", "user", "password", "database");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Dumping debug info after reconnecting
ob_start();
$mysqli->dump_debug_info();
$reconnectDebugInfo = ob_get_clean();
file_put_contents('/tmp/test/reconnect_debug_info.log', $reconnectDebugInfo);
echo "Debug info after reconnect saved." . PHP_EOL;

// Step 9: Dumping the debug info in multiple ways to demonstrate flexibility
foreach (['/tmp/test/input.txt', '/tmp/test/input.zip'] as $file) {
    if (file_exists($file)) {
        echo "Processing debug info for file: $file" . PHP_EOL;
        $mysqli->dump_debug_info(); // Dumping debug info for every file
    }
}

// Final cleanup
$mysqli->close();