<?php

// Real-world example of using PDO vs MySQLi

// Database credentials
$host = 'localhost';
$db = 'test_db';
$user = 'root';
$pass = 'password';

// Scenario 1: Using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Fetching data using a prepared statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(['john@example.com']);
    $result = $stmt->fetchAll();
    print_r($result);

} catch (PDOException $e) {
    echo "PDO Error: " . $e->getMessage();
}

// Scenario 2: Using MySQLi
$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("MySQLi Connection Failed: " . $mysqli->connect_error);
}

// Fetching data using a prepared statement
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$email = 'john@example.com';
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
print_r($result);

$stmt->close();
$mysqli->close();

// Scenario 3: Benchmarking PDO vs MySQLi with large datasets

$emails = ['test1@example.com', 'test2@example.com', 'admin@example.com'];
$pdoTimes = [];
$mysqliTimes = [];

// Benchmark PDO
foreach ($emails as $email) {
    $start = microtime(true);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $pdoTimes[] = microtime(true) - $start;
}

// Benchmark MySQLi
foreach ($emails as $email) {
    $start = microtime(true);
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $mysqliTimes[] = microtime(true) - $start;
}

echo "Average PDO Time: " . (array_sum($pdoTimes) / count($pdoTimes)) . " seconds\n";
echo "Average MySQLi Time: " . (array_sum($mysqliTimes) / count($mysqliTimes)) . " seconds\n";

// Example of reading data from a file with PDO
$filePath = '/tmp/test/input.txt';
if (file_exists($filePath)) {
    $lines = file($filePath);
    foreach ($lines as $line) {
        $stmt = $pdo->prepare("INSERT INTO logs (message) VALUES (?)");
        $stmt->execute([$line]);
    }
}

?>