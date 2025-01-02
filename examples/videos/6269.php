<?php

// Example: Handling large MySQL result sets using mysqli_store_result()

// Step 1: Establish a MySQL database connection
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Step 2: Check for connection errors
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Step 3: Execute a query that returns a large result set
$query = "SELECT * FROM large_table WHERE status = 'active'";
if ($mysqli->real_query($query)) {
    // Step 4: Store the result set using mysqli_store_result()
    $result = $mysqli->store_result();

    // Step 5: Check if the result set is valid
    if ($result) {
        // Process each row individually to avoid memory issues
        while ($row = $result->fetch_assoc()) {
            // Handle each row (for example, print or process data)
            echo "ID: {$row['id']} - Name: {$row['name']}\n";
        }
        
        // Step 6: Free the result to avoid memory leaks
        $result->free();
    } else {
        // Handle case where result set is not valid
        echo "Error storing result: " . $mysqli->error;
    }
}

// Another method: Using prepared statements with mysqli_store_result()

// Step 7: Prepare a statement for querying large data
$stmt = $mysqli->prepare("SELECT * FROM large_table WHERE created_at > ?");

// Step 8: Bind parameters (for example, a specific date)
$date = '2024-01-01';
$stmt->bind_param('s', $date);

// Step 9: Execute the prepared statement
$stmt->execute();

// Step 10: Store the result from the prepared statement
$stmt->store_result();

// Step 11: Bind result variables
$stmt->bind_result($id, $name, $email);

// Step 12: Fetch each row and process the data
while ($stmt->fetch()) {
    // Handle each row (for example, display the data)
    echo "ID: $id, Name: $name, Email: $email\n";
}

// Step 13: Free the stored result to avoid memory exhaustion
$stmt->free_result();

// Step 14: Close the prepared statement and connection
$stmt->close();
$mysqli->close();

// Example: Handling edge cases with large data and multi-query

// Step 15: Execute multiple queries and store their results
$query1 = "SELECT * FROM large_table WHERE active = 1";
$query2 = "SELECT * FROM another_table WHERE category = 'tech'";

// Step 16: Execute the first query
if ($mysqli->real_query($query1)) {
    $result1 = $mysqli->store_result();
    if ($result1) {
        while ($row = $result1->fetch_assoc()) {
            // Process the data from first query
            echo "Result 1 - ID: {$row['id']}, Name: {$row['name']}\n";
        }
        $result1->free();
    }
}

// Step 17: Execute the second query
if ($mysqli->real_query($query2)) {
    $result2 = $mysqli->store_result();
    if ($result2) {
        while ($row = $result2->fetch_assoc()) {
            // Process the data from second query
            echo "Result 2 - ID: {$row['id']}, Category: {$row['category']}\n";
        }
        $result2->free();
    }
}

// Ensure you close the MySQL connection at the end of the script
$mysqli->close();