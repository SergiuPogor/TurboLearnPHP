<?php

// Connect to MySQL database
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a statement
$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");

// Check if preparation was successful
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($mysqli->error));
}

// Bind parameters
$id = 1;
$stmt->bind_param("i", $id);

// Execute the statement
$stmt->execute();

// Retrieve attribute value
$attr = mysqli_stmt_attr_get($stmt, MYSQLI_STMT_ATTR_UPDATE_COUNT);

// Check if the attribute was retrieved successfully
if ($attr !== false) {
    echo "Update count: " . $attr . PHP_EOL;
} else {
    echo "Failed to get attribute." . PHP_EOL;
}

// Fetch results
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    print_r($row);
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>