<?php
// Creating a sample MySQLi connection
$mysqli = new mysqli("localhost", "username", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sample query to fetch users
$query = "SELECT id, name, email FROM users";
$result = $mysqli->query($query);

// Using mysqli_fetch_assoc
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "\n";
}

// Reset the result pointer
$result->data_seek(0);

// Using mysqli_fetch_object
while ($row = $result->fetch_object()) {
    echo "ID: " . $row->id . " - Name: " . $row->name . " - Email: " . $row->email . "\n";
}

$mysqli->close();