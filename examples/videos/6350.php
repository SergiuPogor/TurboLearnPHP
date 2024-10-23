<?php

// Function to demonstrate the use of mysqli_stmt_store_result
function fetchDataWithBuffering($mysqli, $query) {
    // Prepare the statement
    if ($stmt = $mysqli->prepare($query)) {
        // Execute the statement
        $stmt->execute();

        // Store the result
        $stmt->store_result(); // Buffer the result set in memory

        // Get the number of columns in the result
        $numColumns = $stmt->num_fields;

        // Fetching the results
        $result = [];
        $stmt->bind_result(...array_fill(0, $numColumns, '')); // Bind results to variables
        
        // Store each row into an array
        while ($stmt->fetch()) {
            $row = [];
            foreach (func_get_args() as $value) {
                $row[] = $value; // Collecting bound values into a row
            }
            $result[] = $row; // Adding row to results
        }

        $stmt->close(); // Close the statement
        return $result; // Return the fetched results
    } else {
        throw new Exception('Statement preparation failed: ' . $mysqli->error);
    }
}

// Example usage
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_db"); // Connect to MySQL

$query = "SELECT id, name FROM users WHERE active = 1"; // Sample query
$data = fetchDataWithBuffering($mysqli, $query); // Fetch data with buffering

print_r($data); // Output the buffered results

$mysqli->close(); // Close the connection