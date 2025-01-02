<?php

// Function to demonstrate how to use mysqli_stmt_get_warnings
function checkMySQLWarnings($host, $user, $password, $database) {
    // Establish a connection to the database
    $mysqli = new mysqli($host, $user, $password, $database);

    // Check for connection errors
    if ($mysqli->connect_error) {
        echo "Connection failed: " . $mysqli->connect_error . "\n";
        return;
    }

    // Prepare a statement with a potential warning
    $stmt = $mysqli->prepare("INSERT INTO users (name) VALUES (?)");
    $name = "John Doe"; // Valid name
    $stmt->bind_param("s", $name);
    $stmt->execute();

    // Prepare another statement that may cause warnings (e.g., duplicate key)
    $stmt->execute(); // Attempting to insert again might trigger a warning

    // Check for warnings after execution
    if ($warnings = $mysqli->stmt_get_warnings($stmt)) {
        echo "Warnings found:\n";
        foreach ($warnings as $warning) {
            echo "Warning Code: " . $warning['errno'] . "\n";
            echo "Warning Message: " . $warning['message'] . "\n";
            echo "SQL State: " . $warning['sqlstate'] . "\n";
            echo "-------------------------\n";
        }
    } else {
        echo "No warnings found.\n";
    }

    // Close the prepared statement and the connection
    $stmt->close();
    $mysqli->close();
}

// Call the function with example credentials
checkMySQLWarnings('localhost', 'user', 'password', 'database');

?>