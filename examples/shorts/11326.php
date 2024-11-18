<?php

// Comparing MySQLi vs PDO: Secure Database Queries

// 1. Using MySQLi (works only with MySQL databases)
$mysqli = new mysqli("localhost", "user", "password", "my_database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepared statement with MySQLi
$stmt = $mysqli->prepare("SELECT name, email FROM users WHERE id = ?");
$id = 101;
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data1 = $result->fetch_assoc();

$mysqli->close();

// 2. Using PDO (supports multiple databases: MySQL, PostgreSQL, SQLite, etc.)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=my_database", "user", "password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // Prepared statement with PDO
    $stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = :id");
    $stmt->execute(['id' => 101]);
    $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Dynamic database switching with PDO
$databases = ['mysql', 'pgsql', 'sqlite'];
foreach ($databases as $db) {
    $dsn = "$db:host=localhost;dbname=my_database";
    try {
        $pdoSwitch = new PDO($dsn, "user", "password");
        echo "Connected to $db successfully!";
    } catch (PDOException $e) {
        echo "Could not connect to $db: " . $e->getMessage();
    }
}

// Reading data from input file and dynamically fetching users
$inputPath = '/tmp/test/input.txt';
if (file_exists($inputPath)) {
    $userIds = file($inputPath, FILE_IGNORE_NEW_LINES);
    foreach ($userIds as $userId) {
        $stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = :id");
        $stmt->execute(['id' => (int)$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo "Fetched user: " . $user['name'] . "\n";
        }
    }
}
?>