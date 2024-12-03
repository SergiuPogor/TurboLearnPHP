<?php
// Comparing mysqli_connect vs PDO::__construct in PHP

// Example 1: Using mysqli_connect (for MySQL database only)
$mysqli = mysqli_connect('localhost', 'root', 'password', 'database');
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Example 2: Using PDO::__construct (works with multiple database types)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=database', 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Example 3: Using prepared statements with PDO
$query = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$query->execute(['email' => 'example@example.com']);
$user = $query->fetch(PDO::FETCH_ASSOC);

// Example 4: Using mysqli for basic query (no prepared statements)
$query = "SELECT * FROM users WHERE email = 'example@example.com'";
$result = mysqli_query($mysqli, $query);
$user = mysqli_fetch_assoc($result);

// Example 5: Writing to file to compare connection methods
file_put_contents('/tmp/test/db_connections.json', json_encode([
    'mysqli_connection' => ['status' => 'connected', 'db' => 'MySQL'],
    'pdo_connection' => ['status' => 'connected', 'db' => 'MySQL']
], JSON_PRETTY_PRINT));
?>