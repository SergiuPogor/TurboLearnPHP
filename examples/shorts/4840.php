<?php

// Connect to the database using PDO
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Start a transaction
$pdo->beginTransaction();

try {
    // Example of a complex query with nested subqueries
    $stmt = $pdo->prepare(
        "SELECT a.id, a.name, (SELECT COUNT(*) FROM orders o WHERE o.user_id = a.id) as order_count
         FROM users a
         WHERE a.active = :activeStatus"
    );
    $stmt->execute(['activeStatus' => 1]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Commit the transaction
    $pdo->commit();

    // Output the results
    foreach ($users as $user) {
        echo "User: " . htmlspecialchars($user['name']) . ", Orders: " . $user['order_count'] . "<br/>";
    }
} catch (Exception $e) {
    // Rollback the transaction if something goes wrong
    $pdo->rollBack();
    echo 'Failed: ' . $e->getMessage();
}
?>