<?php
// Database connection setup using MySQLi
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Example 1: Securely executing a prepared statement using mysqli_execute()
// Prepared statement to insert a user input into the database
$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");

if ($stmt === false) {
    die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
}

// Binding user input parameters to prevent SQL injection
$username = 'john_doe';
$email = 'john@example.com';
$stmt->bind_param('ss', $username, $email);

// Executing the prepared statement
if (!$stmt->execute()) {
    die('Execute failed: (' . $stmt->errno . ') ' . $stmt->error);
}

// Closing the statement
$stmt->close();

// Example 2: Using mysqli_execute() with multiple prepared statements
// Preparing another statement to update user information
$update_stmt = $mysqli->prepare("UPDATE users SET email = ? WHERE username = ?");
if ($update_stmt === false) {
    die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
}

// Binding new values to the prepared statement
$new_email = 'john_doe_updated@example.com';
$update_stmt->bind_param('ss', $new_email, $username);

// Executing the update statement
if (!$update_stmt->execute()) {
    die('Execute failed: (' . $update_stmt->errno . ') ' . $update_stmt->error);
}

// Closing the update statement
$update_stmt->close();

// Example 3: Reusing a prepared statement to enhance performance
// Preparing a statement for multiple inserts
$multi_insert_stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");

if ($multi_insert_stmt === false) {
    die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
}

// Simulating a loop that inserts multiple records
$users = [
    ['jane_doe', 'jane@example.com'],
    ['mark_smith', 'mark@example.com'],
    ['lisa_jones', 'lisa@example.com']
];

foreach ($users as $user) {
    $multi_insert_stmt->bind_param('ss', $user[0], $user[1]);

    if (!$multi_insert_stmt->execute()) {
        die('Execute failed: (' . $multi_insert_stmt->errno . ') ' . $multi_insert_stmt->error);
    }
}

// Closing the multi-insert statement
$multi_insert_stmt->close();

// Closing the database connection
$mysqli->close();
?>