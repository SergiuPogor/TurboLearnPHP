<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test_db';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a statement with a dynamic number of parameters
$query = "INSERT INTO users (name, email, age) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

// Example user data to insert
$userData = [
    ['John Doe', 'john@example.com', 30],
    ['Jane Smith', 'jane@example.com', 25],
];

// Loop through user data and bind parameters dynamically
foreach ($userData as $user) {
    // Count expected parameters
    $paramCount = mysqli_stmt_param_count($stmt);
    echo "Expected parameters: $paramCount\n";

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssi', $user[0], $user[1], $user[2]);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully.\n";
    } else {
        echo "Error: " . mysqli_error($conn) . "\n";
    }
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>