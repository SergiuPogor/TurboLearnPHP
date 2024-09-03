<?php

// Function to demonstrate the use of mysqli_get_links_stats()
function demonstrateMysqliGetLinksStats() {
    // Create a MySQLi connection
    $mysqli = new mysqli('localhost', 'user', 'password', 'database');
    
    // Check connection
    if ($mysqli->connect_error) {
        throw new Exception('Connection failed: ' . $mysqli->connect_error);
    }
    
    // Perform a simple query
    $mysqli->query("SELECT 1");
    
    // Get connection stats
    $stats = mysqli_get_links_stats();
    
    // Display stats
    echo "Active MySQL connections: " . $stats['total'] . "\n";
    
    // Close connection
    $mysqli->close();
}

// Example usage
try {
    demonstrateMysqliGetLinksStats();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

// Advanced example: Track multiple connections
function trackMultipleConnections() {
    // Create multiple MySQLi connections
    $connections = [
        new mysqli('localhost', 'user', 'password', 'database1'),
        new mysqli('localhost', 'user', 'password', 'database2')
    ];
    
    // Check connections
    foreach ($connections as $conn) {
        if ($conn->connect_error) {
            echo 'Connection failed: ' . $conn->connect_error . "\n";
        }
    }
    
    // Perform queries
    foreach ($connections as $conn) {
        $conn->query("SELECT 1");
    }
    
    // Get connection stats
    $stats = mysqli_get_links_stats();
    
    // Display stats
    echo "Active MySQL connections: " . $stats['total'] . "\n";
    
    // Close connections
    foreach ($connections as $conn) {
        $conn->close();
    }
}

// Example usage
trackMultipleConnections();
?>