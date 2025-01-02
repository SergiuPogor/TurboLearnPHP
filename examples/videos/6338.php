<?php

// Enable error reporting for MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Connect to the MySQL database
try {
    $conn = new mysqli("localhost", "username", "password", "database");

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $userId = 1; // Example user ID

    // Bind parameters
    $stmt->bind_param("i", $userId);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        echo "User ID: " . $user['id'] . "\n";
        echo "User Name: " . $user['name'] . "\n";
    } else {
        echo "No user found with ID: $userId\n";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

} catch (mysqli_sql_exception $e) {
    // Handle MySQLi errors
    echo "Error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    // Handle other exceptions
    echo "Error: " . $e->getMessage() . "\n";
}
?>