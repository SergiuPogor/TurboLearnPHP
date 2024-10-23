<?php

// Check if MySQLi is thread-safe
if (mysqli_thread_safe()) {
    echo "MySQLi is thread-safe. You can use it in multi-threaded applications.\n";
} else {
    echo "Warning: MySQLi is not thread-safe! Be cautious with concurrent access.\n";
}

// Example of using MySQLi in a multi-threaded environment
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to fetch user data
function fetchUserData($mysqli, $userId) {
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_assoc();
}

// Use in threads (simulation)
$userIds = [1, 2, 3, 4, 5];
foreach ($userIds as $id) {
    $userData = fetchUserData($mysqli, $id);
    echo "User ID: " . $userData['id'] . ", Name: " . $userData['name'] . "\n";
}

// Close the connection
$mysqli->close();

?>