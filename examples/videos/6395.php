<?php

// Function to execute a prepared statement with mysqli_execute_query
function executePreparedQuery($mysqli, $sql, $params) {
    // Prepare the SQL statement
    $stmt = $mysqli->prepare($sql);
    
    // Bind parameters dynamically
    if ($params) {
        $types = str_repeat('s', count($params)); // Assuming all parameters are strings
        $stmt->bind_param($types, ...$params);
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        return $stmt->get_result(); // Return the result set
    } else {
        throw new Exception("Error executing query: " . $stmt->error);
    }
}

// Example usage of executePreparedQuery function
$mysqli = new mysqli("localhost", "user", "password", "database");

$sql = "SELECT * FROM users WHERE age > ? AND status = ?";
$params = [25, 'active'];

try {
    $result = executePreparedQuery($mysqli, $sql, $params);
    while ($row = $result->fetch_assoc()) {
        // Process each row
        echo "User: " . $row['name'] . ", Age: " . $row['age'] . "\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

// Cleanup
$mysqli->close();
?>