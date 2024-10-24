<?php
// Example: Using mysqli_stmt_sqlstate() for improved error handling

// Step 1: Create a MySQLi connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Prepare a SQL statement
$stmt = $mysqli->prepare("SELECT * FROM non_existent_table WHERE id = ?");

// Check if the statement was prepared successfully
if (!$stmt) {
    echo "Statement preparation failed: (" . $mysqli->errno . ") " . $mysqli->error . "\n";
    exit;
}

// Step 3: Bind parameters
$id = 1;
$stmt->bind_param("i", $id);

// Step 4: Execute the statement
$stmt->execute();

// Step 5: Check for errors and get SQLSTATE value
if ($stmt->errno) {
    echo "Error executing statement: (" . $stmt->errno . ") " . $stmt->error . "\n";
    echo "SQLSTATE value: " . $stmt->sqlstate . "\n";
} else {
    // Fetch results if no error
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
}

// Step 6: Clean up
$stmt->close();
$mysqli->close();

// Function to execute a statement and print SQLSTATE value
function executeStatement($mysqli, $query, $param_type, $param_value) {
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        echo "Statement preparation failed: (" . $mysqli->errno . ") " . $mysqli->error . "\n";
        return;
    }

    $stmt->bind_param($param_type, $param_value);
    $stmt->execute();

    if ($stmt->errno) {
        echo "Error executing statement: (" . $stmt->errno . ") " . $stmt->error . "\n";
        echo "SQLSTATE value: " . $stmt->sqlstate . "\n";
    } else {
        echo "Statement executed successfully!\n";
    }

    $stmt->close();
}

// Example usage
executeStatement($mysqli, "SELECT * FROM another_non_existent_table WHERE id = ?", "i", 1);
?>