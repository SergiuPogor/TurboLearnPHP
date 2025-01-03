<?php
// Database connection
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Example query to fetch data from users table
$sql = "SELECT * FROM users WHERE status = 'active'";
$result = $mysqli->query($sql);

// Check if the query was successful
if ($result) {
    // Use mysqli_num_rows() to get the number of rows returned
    $rowCount = mysqli_num_rows($result);

    // Validate the number of rows
    if ($rowCount > 0) {
        echo "Number of active users: " . $rowCount . "\n";
        
        // Fetching and displaying user data
        while ($row = $result->fetch_assoc()) {
            echo "User ID: " . $row['id'] . " - Username: " . $row['username'] . "\n";
        }
    } else {
        echo "No active users found.\n";
    }
} else {
    echo "Error executing query: " . $mysqli->error . "\n";
}

// Close the result set and the database connection
$result->close();
$mysqli->close();
?>