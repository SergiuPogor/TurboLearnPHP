<?php

// Database connection parameters
$host = "localhost";
$user = "username";
$password = "password";
$database1 = "database1";
$database2 = "database2";

// Create a connection
$mysqli = new mysqli($host, $user, $password);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Select the first database
if ($mysqli->select_db($database1)) {
    echo "Switched to database: $database1" . PHP_EOL;
} else {
    echo "Error selecting database: $database1" . PHP_EOL;
}

// Example query on first database
$query1 = "SELECT * FROM users";
$result1 = $mysqli->query($query1);
if ($result1) {
    while ($row = $result1->fetch_assoc()) {
        echo "User: " . $row["name"] . PHP_EOL;
    }
}

// Now switch to the second database
if ($mysqli->select_db($database2)) {
    echo "Switched to database: $database2" . PHP_EOL;
} else {
    echo "Error selecting database: $database2" . PHP_EOL;
}

// Example query on second database
$query2 = "SELECT * FROM orders";
$result2 = $mysqli->query($query2);
if ($result2) {
    while ($row = $result2->fetch_assoc()) {
        echo "Order ID: " . $row["id"] . PHP_EOL;
    }
}

// Close the connection
$mysqli->close();
?>