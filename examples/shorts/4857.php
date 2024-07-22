<?php
// Example function to handle concurrent database writes
function performConcurrentWrites(PDO $pdo, array $queries) {
    try {
        // Begin transaction
        $pdo->beginTransaction();

        foreach ($queries as $query) {
            // Prepare and execute each query
            $stmt = $pdo->prepare($query['sql']);
            $stmt->execute($query['params']);
        }

        // Commit transaction
        $pdo->commit();
    } catch (PDOException $e) {
        // Rollback transaction on error
        $pdo->rollBack();

        // Log or handle the error
        error_log("Transaction failed: " . $e->getMessage());
    }
}

// Example usage
$pdo = new PDO('mysql:host=localhost;dbname=testdb', 'username', 'password');

// Define concurrent write queries
$queries = [
    [
        'sql' => 'UPDATE users SET balance = balance - ? WHERE id = ?',
        'params' => [100, 1]
    ],
    [
        'sql' => 'UPDATE users SET balance = balance + ? WHERE id = ?',
        'params' => [100, 2]
    ]
];

// Perform concurrent writes
performConcurrentWrites($pdo, $queries);
?>