<?php

// Database configuration
$host = 'localhost';
$dbname = 'test_db';
$username = 'root';
$password = 'password'; // Use your actual database password

// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->errorInfo());
}

// Dynamic content retrieval
$query = "SELECT * FROM articles WHERE status = :status";
$stmt = $conn->prepare($query);
$stmt->execute(['status' => 'published']);

// Fetch results
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display dynamic content
foreach ($articles as $article) {
    echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
    echo "<p>" . htmlspecialchars($article['content']) . "</p>";
}

// Closing connection
$conn = null;