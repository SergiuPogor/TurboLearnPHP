<?php
// Using prepared statements to prevent SQL injection
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'dbuser';
$password = 'dbpass';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    
    // Bind the parameters
    $email = $_POST['email'];
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch the results
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        echo "User found: " . htmlspecialchars($user['name']);
    } else {
        echo "No user found.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}