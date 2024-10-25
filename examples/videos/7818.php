<?php
// Include the database connection file
require 'database.php';

// Function to perform multiple queries using transactions
function performTransaction(int $userId, float $amount): void {
    global $pdo;

    try {
        // Start the transaction
        $pdo->beginTransaction();

        // First query: Deduct amount from user's balance
        $stmt1 = $pdo->prepare("UPDATE users SET balance = balance - :amount WHERE id = :userId");
        $stmt1->execute(['amount' => $amount, 'userId' => $userId]);

        // Simulate a second query (e.g., logging the transaction)
        $stmt2 = $pdo->prepare("INSERT INTO transactions (user_id, amount, transaction_type) VALUES (:userId, :amount, 'debit')");
        $stmt2->execute(['userId' => $userId, 'amount' => $amount]);

        // If both queries are successful, commit the transaction
        $pdo->commit();
        echo "Transaction completed successfully!";
    } catch (Exception $e) {
        // If there's an error, roll back the transaction
        $pdo->rollBack();
        echo "Transaction failed: " . $e->getMessage();
    }
}

// Example usage
$userId = 1; // User ID
$amount = 50.00; // Amount to deduct
performTransaction($userId, $amount);

// Function to test transaction rollback
function testTransactionRollback(int $userId, float $amount): void {
    global $pdo;

    try {
        // Start the transaction
        $pdo->beginTransaction();

        // First query: Deduct amount from user's balance
        $stmt1 = $pdo->prepare("UPDATE users SET balance = balance - :amount WHERE id = :userId");
        $stmt1->execute(['amount' => $amount, 'userId' => $userId]);

        // Simulate an error
        if ($amount > 100) {
            throw new Exception("Amount exceeds limit.");
        }

        // Second query: Log the transaction
        $stmt2 = $pdo->prepare("INSERT INTO transactions (user_id, amount, transaction_type) VALUES (:userId, :amount, 'debit')");
        $stmt2->execute(['userId' => $userId, 'amount' => $amount]);

        // Commit the transaction
        $pdo->commit();
    } catch (Exception $e) {
        // Rollback if any query fails
        $pdo->rollBack();
        echo "Transaction rollback due to error: " . $e->getMessage();
    }
}

// Example rollback test
testTransactionRollback($userId, 150.00);