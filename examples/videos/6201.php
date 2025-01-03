<?php

// Example: Using mysqli_stmt_more_results() for multiple result sets

// Step 1: Create a MySQLi connection
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Prepare a stored procedure that returns multiple result sets
$query = "CALL GetUserAndOrderData(?)"; // Assume this stored procedure returns user and order data

// Step 3: Initialize statement
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $userId); // Binding user ID

// Step 4: Execute the statement
$stmt->execute();

// Step 5: Fetch the first result set
$result1 = $stmt->get_result();
while ($row = $result1->fetch_assoc()) {
    echo "User: " . $row['username'] . "\n";
}

// Step 6: Check for more results
while ($stmt->more_results() && $stmt->next_result()) {
    $result2 = $stmt->get_result();
    while ($row = $result2->fetch_assoc()) {
        echo "Order: " . $row['order_id'] . " - " . $row['order_total'] . "\n";
    }
}

// Step 7: Close the statement and connection
$stmt->close();
$mysqli->close();

?>