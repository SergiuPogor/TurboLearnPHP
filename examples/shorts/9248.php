<?php
// Function to find slow parts of the code
function measureExecutionTime($callback) {
    $start = microtime(true);
    
    // Call the callback function
    $callback();
    
    $end = microtime(true);
    return $end - $start;
}

// Example usage
$timeTaken = measureExecutionTime(function() {
    // Simulate a slow operation (like a database call)
    sleep(1); // Simulates delay
});

// Output the execution time
echo "Time taken: " . $timeTaken . " seconds.\n";

// Database profiling example (using PDO for safety)
function queryDatabase($pdo) {
    $start = microtime(true);
    $stmt = $pdo->query("SELECT * FROM users WHERE active = 1");
    $result = $stmt->fetchAll();
    $end = microtime(true);

    echo "Query executed in: " . ($end - $start) . " seconds.\n";
    return $result;
}

// PDO connection (replace with your actual DB credentials)
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');
$queryResult = queryDatabase($pdo);