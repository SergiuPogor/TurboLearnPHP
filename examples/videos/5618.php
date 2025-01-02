<?php

// Example: Using mysqli_stat() to monitor MySQL database status

// Create a new MySQLi connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to get database status
function getDatabaseStatus($mysqli) {
    // Fetch the current status of the MySQL server
    $status = $mysqli->stat();
    
    // Return the status information
    return $status;
}

// Retrieve and display database status
$dbStatus = getDatabaseStatus($mysqli);
echo "Current MySQL Status: $dbStatus\n";

// Example 2: Log the database status to a file for monitoring

function logDatabaseStatus($mysqli, $logFile = '/tmp/test/db_status.log') {
    $status = $mysqli->stat();
    $timestamp = date("Y-m-d H:i:s");
    $logMessage = "[$timestamp] MySQL Status: $status\n";
    
    // Write the status to a log file
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Log the database status
logDatabaseStatus($mysqli);

// Example 3: Analyze server status for debugging purposes

function analyzeStatus($status) {
    $statusDetails = explode(" ", $status);
    
    // Example: Check if server is running and log details
    if (strpos($status, "Uptime") !== false) {
        echo "Server is running. Status details:\n";
        print_r($statusDetails);
    } else {
        echo "Server might be down. Please check!\n";
    }
}

// Analyze the database status
analyzeStatus($dbStatus);

// Example 4: Monitoring multiple databases

function monitorMultipleDatabases($connections) {
    foreach ($connections as $name => $conn) {
        echo "Status for $name: " . $conn->stat() . "\n";
    }
}

// Sample connections array
$connections = [
    'db1' => new mysqli("localhost", "user1", "pass1", "database1"),
    'db2' => new mysqli("localhost", "user2", "pass2", "database2"),
];

// Monitor multiple databases
monitorMultipleDatabases($connections);

// Close the MySQLi connection
$mysqli->close();

?>