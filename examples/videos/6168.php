<?php

// Establish a connection to MySQL
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform some database operations
$query1 = "SELECT * FROM users";
$result1 = $mysqli->query($query1);

if ($result1) {
    while ($row = $result1->fetch_assoc()) {
        echo "User: " . $row['username'] . "\n";
    }
    $result1->free();
}

// Perform another query
$query2 = "SELECT * FROM orders";
$result2 = $mysqli->query($query2);

if ($result2) {
    while ($row = $result2->fetch_assoc()) {
        echo "Order ID: " . $row['order_id'] . "\n";
    }
    $result2->free();
}

// Close the database connection
if ($mysqli->close()) {
    echo "Database connection closed successfully.";
} else {
    echo "Error closing connection: " . $mysqli->connect_error;
}

?>