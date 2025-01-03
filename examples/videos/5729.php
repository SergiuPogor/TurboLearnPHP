<?php

// Connect to the database
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Prepare a statement for user data insertion
$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
if ($stmt === false) {
    die('Error preparing statement: ' . $mysqli->error);
}

// Bind parameters and execute the first statement
$username = 'john_doe';
$email = 'john@example.com';
$stmt->bind_param('ss', $username, $email);
if (!$stmt->execute()) {
    die('Error executing first statement: ' . $stmt->error);
}

// Now we want to reuse the same statement BUT for different data
// Here's where you can face issues if you don't reset the statement properly!

// Before reusing the statement, reset it
if (!mysqli_stmt_reset($stmt)) {
    die('Error resetting statement: ' . $stmt->error);
}

// Bind new data and execute again
$username = 'jane_doe';
$email = 'jane@example.com';
$stmt->bind_param('ss', $username, $email);
if (!$stmt->execute()) {
    die('Error executing second statement: ' . $stmt->error);
}

// Let’s see another way to handle this: with different queries on the same statement
$stmt = $mysqli->prepare("UPDATE users SET email = ? WHERE username = ?");
if ($stmt === false) {
    die('Error preparing update statement: ' . $mysqli->error);
}

// Reuse the statement with dynamic values BUT reset it every time to avoid errors
$new_email = 'jane_new@example.com';
$stmt->bind_param('ss', $new_email, $username);

if (!$stmt->execute()) {
    die('Error executing third statement: ' . $stmt->error);
}

// Reset before reusing it again
mysqli_stmt_reset($stmt);

// Another update with different data
$new_email = 'john_new@example.com';
$stmt->bind_param('ss', $new_email, 'john_doe');

if (!$stmt->execute()) {
    die('Error executing fourth statement: ' . $stmt->error);
}

// Demonstrate a final advanced use-case: working with large batches
$batch_data = [
    ['alice', 'alice@example.com'],
    ['bob', 'bob@example.com'],
    ['charlie', 'charlie@example.com'],
];

$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");

foreach ($batch_data as $data) {
    mysqli_stmt_reset($stmt);  // Reset before reusing
    $stmt->bind_param('ss', $data[0], $data[1]);
    
    if (!$stmt->execute()) {
        die('Batch insert error: ' . $stmt->error);
    }
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

?>