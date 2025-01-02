<?php

// File to test MySQLi connection statistics
$host = 'localhost';
$user = 'root';
$password = 'password';
$database = 'test_db';

// Create a new MySQLi connection
$mysqli = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Execute some queries for testing
$query1 = "SELECT * FROM users WHERE status = 'active'";
$query2 = "SELECT COUNT(*) FROM orders WHERE created_at > NOW() - INTERVAL 30 DAY";

// Running first query
$result1 = $mysqli->query($query1);
if (!$result1) {
    echo "Query 1 Error: " . $mysqli->error;
}

// Running second query
$result2 = $mysqli->query($query2);
if (!$result2) {
    echo "Query 2 Error: " . $mysqli->error;
}

// Getting MySQL connection statistics
$stats = $mysqli->get_connection_stats();

// Displaying stats
echo "MySQL Connection Statistics:\n";
foreach ($stats as $key => $value) {
    echo ucfirst($key) . ": " . $value . "\n";
}

// Close the connection
$mysqli->close();
?>