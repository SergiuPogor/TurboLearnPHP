<?php

// Example: Using mysqli_stmt_close() to manage resources in PHP

// Database connection
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a statement
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");

// Bind parameters
$email = 'user@example.com';
$stmt->bind_param("s", $email);

// Execute the statement
$stmt->execute();

// Fetch results
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);

// Output results
foreach ($users as $user) {
    echo "User: " . $user['name'] . "\n";
}

// Important: Close the statement to free resources
$stmt->close();

// Let's demonstrate reopening and using a new statement
$stmt2 = $mysqli->prepare("SELECT * FROM products WHERE price > ?");
$minPrice = 100;
$stmt2->bind_param("d", $minPrice);
$stmt2->execute();

$result2 = $stmt2->get_result();
$products = $result2->fetch_all(MYSQLI_ASSOC);

// Output results for products
foreach ($products as $product) {
    echo "Product: " . $product['name'] . "\n";
}

// Close the second statement as well
$stmt2->close();

// Close the database connection
$mysqli->close();

?>