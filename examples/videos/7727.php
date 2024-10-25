<?php

// Database connection using PDO
$dsn = 'mysql:host=localhost;dbname=my_database;charset=utf8mb4';
$username = 'user';
$password = 'password';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optimizing with prepared statements
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => 'example@example.com']);
    $user = $stmt->fetch();

    // Optimizing with indexing
    // Assume we have an index on the 'created_at' column
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE created_at > :date");
    $stmt->execute([':date' => '2023-01-01']);
    $orders = $stmt->fetchAll();

    // Batch processing with transactions
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO logs (message) VALUES (:message)");
    
    $messages = ['Log 1', 'Log 2', 'Log 3']; // Example log messages
    foreach ($messages as $message) {
        $stmt->execute([':message' => $message]);
    }
    
    $pdo->commit();

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>