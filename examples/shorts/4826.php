<?php

// Example PHP code to prevent SQL injection using PDO

// Database credentials
$host = 'localhost';
$db = 'testdb';
$user = 'root';
$pass = 'password';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare an SQL statement with placeholders
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

    // User input (for demonstration purposes)
    $inputUsername = 'admin';
    $inputPassword = 'secret';

    // Bind parameters to placeholders
    $stmt->bindParam(':username', $inputUsername, PDO::PARAM_STR);
    $stmt->bindParam(':password', $inputPassword, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Fetch all the resulting rows
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the results (for demonstration purposes)
    echo "Users found: " . count($results) . "\n";
    foreach ($results as $row) {
        echo "Username: " . $row['username'] . "\n";
        echo "Email: " . $row['email'] . "\n";
    }

} catch (PDOException $e) {
    // Handle any errors
    echo "Error: " . $e->getMessage() . "\n";
    // Code must go on, but don't tell the user why it failed
    echo "Oops! Something went wrong. Please try again later.\n";
}

// Humor in code: Always wear your PDO-armor!
echo "\nStay safe, and keep those SQL injections at bay!\n";

?>