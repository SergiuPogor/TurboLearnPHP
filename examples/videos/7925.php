<?php
// Connection setup
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = '';

// Establishing a PDO connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Function to get user by ID using prepared statements
function getUserById($pdo, $id) {
    // Prepare the SQL statement
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    // Bind the parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    // Fetch the result
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to add a new user
function addUser($pdo, $name, $email) {
    // Prepare the SQL statement
    $stmt = $pdo->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');
    // Bind parameters
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
}

// Function to update user email
function updateUserEmail($pdo, $id, $email) {
    // Prepare the SQL statement
    $stmt = $pdo->prepare('UPDATE users SET email = :email WHERE id = :id');
    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    // Execute the statement
    $stmt->execute();
}

// Example usage
$user = getUserById($pdo, 1);
if ($user) {
    echo "User: " . htmlspecialchars($user['name']) . " - " . htmlspecialchars($user['email']);
}

// Adding a new user
addUser($pdo, 'John Doe', 'john@example.com');

// Updating user email
updateUserEmail($pdo, 1, 'newemail@example.com');
?>