<?php

// Example of PHP PDO prepared statement

// Database connection settings
$host = "localhost";
$dbname = "my_database";
$username = "root";
$password = "";

try {
    // Establish PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Prepare statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    
    // Bind parameters
    $email = "john.doe@example.com";
    $stmt->bindParam(":email", $email);
    
    // Execute statement
    $stmt->execute();
    
    // Fetch results
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Output results
    echo "User ID: " . $user['id'] . "<br>";
    echo "Username: " . $user['username'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>