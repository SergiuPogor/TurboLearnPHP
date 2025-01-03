<?php
// Database connection parameters
$dbHost = 'localhost';
$dbName = 'my_database';
$dbUser = 'my_user';
$dbPass = 'my_password';

// Create a connection to the MySQL database
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get the process ID and kill it
function killLongRunningQuery($conn, $processId) {
    // Execute mysqli_kill to terminate the process
    if ($conn->kill($processId)) {
        echo "Process with ID $processId has been terminated.\n";
    } else {
        echo "Failed to terminate process with ID $processId: " . $conn->error . "\n";
    }
}

// Sample query that runs for a long time
$query = "SELECT SLEEP(10);"; // Simulates a long-running query
$conn->query($query);

// Fetch the process ID of the last query
$processId = $conn->insert_id;

// Check if the process is still running (just an example)
sleep(5); // Wait before terminating

// Terminate the long-running query
killLongRunningQuery($conn, $processId);

// Close the database connection
$conn->close();
?>