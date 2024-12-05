<?php
// Example 1: Using PDO Prepared Statements (Safe method)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $email = "user@example.com"; // Example email input
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Example 2: Using Manual Escaping (Unsafe method)
$email = "user@example.com'; DROP TABLE users; --";
$connection = mysqli_connect('localhost', 'user', 'password', 'testdb');

// Manually escaping input, vulnerable to human error
$safe_email = mysqli_real_escape_string($connection, $email);
$query = "SELECT * FROM users WHERE email = '$safe_email'";
$result = mysqli_query($connection, $query);

if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    print_r($data);
} else {
    echo "Query failed: " . mysqli_error($connection);
}

mysqli_close($connection);
?>