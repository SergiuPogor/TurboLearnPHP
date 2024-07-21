<?php
// Using prepared statements in PHP to prevent SQL injection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "exampleDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a statement to insert user data
    $stmt = $conn->prepare("INSERT INTO Users (username, email) VALUES (:username, :email)");

    // Bind parameters to prevent SQL injection
    $stmt->bindParam(':username', $usernameParam);
    $stmt->bindParam(':email', $emailParam);

    // Example user data
    $usernameParam = "Alice";
    $emailParam = "alice@example.com";

    // Execute the statement
    $stmt->execute();
    echo "New record created successfully";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

// Remember, always prepare your statements. 
// Because your database deserves more than a leap of faith!
?>