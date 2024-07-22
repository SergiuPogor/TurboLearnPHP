<?php

// Example PHP code demonstrating the use of prepared statements

// Establish database connection (replace with your database credentials)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set PDO to throw exceptions on error
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Prepare a SQL statement
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
  
  // Bind parameters
  $username = "john_doe";
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  
  // Execute the prepared statement
  $stmt->execute();
  
  // Fetch results
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  // Output results
  print_r($result);
  
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;

?>