<?php

// Function to execute multiple prepared statements efficiently
function executePreparedStatements($mysqli, $queries) {
    foreach ($queries as $query) {
        // Prepare the statement
        $stmt = $mysqli->prepare($query);
        
        // Execute the statement
        $stmt->execute();
        
        // Fetch results if any
        if ($result = $stmt->get_result()) {
            while ($row = $result->fetch_assoc()) {
                // Process each row
                echo "Data: " . json_encode($row) . "\n";
            }
            // Free result set to free up memory
            mysqli_stmt_free_result($stmt);
        }

        // Close the statement
        $stmt->close();
    }
}

// Example usage of executePreparedStatements function
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_db");

// Sample queries to execute
$queries = [
    "SELECT * FROM users WHERE age > 18",
    "SELECT * FROM orders WHERE status = 'completed'",
    "SELECT * FROM products WHERE stock > 0"
];

try {
    executePreparedStatements($mysqli, $queries);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Cleanup
$mysqli->close();
?>