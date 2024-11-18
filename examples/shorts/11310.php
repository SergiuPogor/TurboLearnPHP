<?php
// Using mysqli_query for a MySQL-specific query
$mysqli = new mysqli("localhost", "user", "password", "database");
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['name'];
}

// Using PDO::exec for a query (works across multiple databases)
$pdo = new PDO('mysql:host=localhost;dbname=database', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com')");

// Using PDO::exec for a database interaction with prepared statements (secure)
$sql = "UPDATE users SET email = :email WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => 'new.email@example.com', ':id' => $user_id]);
?>