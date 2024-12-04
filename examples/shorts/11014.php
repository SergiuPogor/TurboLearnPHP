<?php
// Example 1: Using PDO to connect to a MySQL database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test_db', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['name'] . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Example 2: Using MySQLi to connect to a MySQL database
$mysqli = new mysqli('localhost', 'username', 'password', 'test_db');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['name'] . "\n";
    }
} else {
    echo "0 results";
}
$mysqli->close();

// Example 3: Using PDO with prepared statements
$pdo = new PDO('mysql:host=localhost;dbname=test_db', 'username', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$id = 1; // Example of binding value
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'] . "\n";
}
?>