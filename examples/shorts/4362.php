<?php
// Example of Secure Data Handling with Prepared Statements

// Database connection
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "wildlife_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("SELECT species, habitat FROM animals WHERE name = ?");
$stmt->bind_param("s", $name);

$name = "dolphin"; // Feel free to replace with a more ferocious example
$stmt->execute();

$stmt->bind_result($species, $habitat);

while ($stmt->fetch()) {
    echo "Species: $species, Habitat: $habitat\n";
    // Maybe these dolphins meditate to stay focused too!
}

$stmt->close();
$conn->close();
?>