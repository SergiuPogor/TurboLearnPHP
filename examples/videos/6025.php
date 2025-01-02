<?php
// Example PHP code demonstrating mysqli_stmt_error_list()

// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = 'password';
$database = 'example_db';

// Create a new database connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a statement with a potential SQL error
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

// Sample data
$name = 'John Doe';
$email = 'john.doe@example.com';

// Execute the statement
if (!$stmt->execute()) {
    // Retrieve error details using mysqli_stmt_error_list()
    $errors = $stmt->error_list;
    
    // Output error details
    echo "Error executing statement:\n";
    foreach ($errors as $error) {
        echo "Error Number: " . $error['errno'] . " - Error Message: " . $error['error'] . "\n";
    }
} else {
    echo "New record created successfully";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>