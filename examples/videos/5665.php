<?php

// Database connection parameters
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'test_db';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare an SQL statement using mysqli_stmt_init
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, 'SELECT * FROM users WHERE email = ?')) {
    die("SQL statement preparation failed: " . mysqli_error($conn));
}

// User input
$email = 'user@example.com';

// Bind parameters
mysqli_stmt_bind_param($stmt, 's', $email);

// Execute the statement
mysqli_stmt_execute($stmt);

// Fetch result
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
    echo "User ID: " . $row['id'] . " - Name: " . $row['name'] . "\n";
}

// Close statement and connection
mysqli_stmt_close($stmt);
$conn->close();

// Example of using mysqli_stmt_init with an INSERT statement
$stmt2 = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt2, 'INSERT INTO users (name, email) VALUES (?, ?)')) {
    die("SQL statement preparation failed: " . mysqli_error($conn));
}

// User input for insert
$name = 'New User';
$emailToInsert = 'newuser@example.com';

// Bind parameters for insert
mysqli_stmt_bind_param($stmt2, 'ss', $name, $emailToInsert);

// Execute the insert statement
if (mysqli_stmt_execute($stmt2)) {
    echo "New user inserted successfully.\n";
} else {
    echo "Error inserting user: " . mysqli_stmt_error($stmt2) . "\n";
}

// Close second statement
mysqli_stmt_close($stmt2);
?>