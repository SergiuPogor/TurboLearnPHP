<?php
// Database connection using PDO
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = 'password123';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // If connection fails, display an error
    die('Connection failed: ' . $e->getMessage());
}

// Example user input
$userId = 42;

// Prepare an SQL statement with a named parameter
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindParam(':id', $userId, PDO::PARAM_INT);

// Execute the statement
$stmt->execute();

// Fetch the results
$user = $stmt->fetch();

if ($user) {
    echo "User found: " . $user['name'] . PHP_EOL;
} else {
    echo "No user found with ID $userId" . PHP_EOL;
}

// More secure query example: updating a user's email
$newEmail = 'newemail@example.com';
$stmt = $pdo->prepare('UPDATE users SET email = :email WHERE id = :id');
$stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
$stmt->bindParam(':id', $userId, PDO::PARAM_INT);

// Execute the update
if ($stmt->execute()) {
    echo "User's email updated to $newEmail" . PHP_EOL;
} else {
    echo "Failed to update user's email" . PHP_EOL;
}
?>