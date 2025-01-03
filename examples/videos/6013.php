<?php
// Establish a MySQLi connection
$mysqli = new mysqli('localhost', 'initial_user', 'password', 'database');

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Display current user
$current_user = $mysqli->get_user();
echo "Current User: " . $current_user . "\n";

// Change user to a different one
if ($mysqli->change_user('new_user', 'new_password', 'database')) {
    echo "User changed successfully to: " . $mysqli->get_user() . "\n";
} else {
    echo "Error changing user: " . $mysqli->error . "\n";
}

// Execute a query as the new user
$result = $mysqli->query("SELECT * FROM users WHERE status = 'active'");
while ($row = $result->fetch_assoc()) {
    echo "Active User: " . $row['username'] . "\n";
}

// Change back to the original user if needed
if ($mysqli->change_user('initial_user', 'password', 'database')) {
    echo "Reverted back to: " . $mysqli->get_user() . "\n";
} else {
    echo "Error reverting user: " . $mysqli->error . "\n";
}

// Close the connection
$mysqli->close();
?>