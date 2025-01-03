<?php

// Database configuration
$dbHost = 'localhost';
$dbUser = 'myuser';
$dbPass = 'mypassword';
$dbName = 'mydatabase';

// Create connection with error handling
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Using prepared statements for secure queries
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
$email = 'test@example.com'; // Example user input
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);

// Fetch results
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
    // Process each row
    echo "User ID: " . $row['id'] . ", Name: " . $row['name'] . "\n";
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>