<?php

// Connect to the MySQL database
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform a query
$query = "SELECT * FROM nonexistent_table"; // Intentionally wrong to trigger a warning
$result = $mysqli->query($query);

// Check for warnings after the query
$warningsCount = $mysqli->warning_count;

if ($warningsCount > 0) {
    echo "Warnings detected: $warningsCount\n";
    // Fetch warnings
    $resultWarnings = $mysqli->query("SHOW WARNINGS");
    while ($warning = $resultWarnings->fetch_assoc()) {
        echo "Warning Level: " . $warning['Level'] . "\n";
        echo "Warning Code: " . $warning['Code'] . "\n";
        echo "Warning Message: " . $warning['Message'] . "\n";
    }
} else {
    echo "No warnings detected.\n";
}

// Always close the connection
$mysqli->close();
?>