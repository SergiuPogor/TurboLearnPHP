<?php

// Database connection settings
$dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8';
$username = 'user';
$password = 'password';

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Example user input
    $userInput = "1; DROP TABLE users"; // Simulating an injection attempt

    // Prepare an SQL statement
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");

    // Bind parameters
    $stmt->bindParam(':id', $userInput, PDO::PARAM_INT);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the results
    foreach ($results as $row) {
        echo "Product Name: " . htmlspecialchars($row['name']) . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>