<?php

// Step 1: Connect to the database using MySQLi
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Step 2: Prepare and execute a simple SELECT query
$query = "SELECT id, username, email FROM users WHERE active = 1";
$result = $mysqli->query($query);

// Step 3: Fetch results using mysqli_fetch_row(), iterate through numeric array
while ($row = mysqli_fetch_row($result)) {
    echo "User ID: " . $row[0] . "\n";
    echo "Username: " . $row[1] . "\n";
    echo "Email: " . $row[2] . "\n";
}

// Step 4: Compare performance by fetching rows in different ways

// Using mysqli_fetch_assoc() - associative array (common but slower for index-based access)
$result_assoc = $mysqli->query($query);
while ($row = mysqli_fetch_assoc($result_assoc)) {
    echo "Username (assoc): " . $row['username'] . "\n";
}

// Using mysqli_fetch_row() - numeric array (faster for indexed access)
$result_row = $mysqli->query($query);
while ($row = mysqli_fetch_row($result_row)) {
    echo "Username (row): " . $row[1] . "\n";
}

// Step 5: Fetch the same data in batch processing for large datasets
$large_query = "SELECT id, data FROM large_table";
$large_result = $mysqli->query($large_query);

// Use mysqli_fetch_row() to handle large datasets
while ($row = mysqli_fetch_row($large_result)) {
    // Process each row, imagine each row is processed for batch inserts, exports, etc.
    echo "Processing Row ID: " . $row[0] . "\n";
}

// Step 6: Fetch multiple tables' data with joins and use mysqli_fetch_row()
$join_query = "
    SELECT u.id, u.username, p.post_title 
    FROM users u 
    JOIN posts p ON u.id = p.user_id 
    WHERE u.active = 1
";
$join_result = $mysqli->query($join_query);

while ($row = mysqli_fetch_row($join_result)) {
    echo "User: " . $row[1] . " - Post: " . $row[2] . "\n";
}

// Step 7: Store results in a file for further processing
$fetch_file = '/tmp/test/fetch_output.txt';
file_put_contents($fetch_file, print_r($row, true), FILE_APPEND);

// Step 8: Batch processing with row fetching
$batch_query = "SELECT id, email FROM users LIMIT 100";
$batch_result = $mysqli->query($batch_query);

while ($batch_row = mysqli_fetch_row($batch_result)) {
    // Process rows in batches
    echo "Batch Row ID: " . $batch_row[0] . ", Email: " . $batch_row[1] . "\n";
}

// Step 9: Another advanced usage - using prepared statements with fetch_row
$stmt = $mysqli->prepare("SELECT id, username FROM users WHERE id = ?");
$stmt->bind_param('i', $user_id);

$user_id = 42; // Example user ID
$stmt->execute();
$stmt->bind_result($id, $username);

// Fetch the row data with fetch_row-like style
while ($stmt->fetch()) {
    echo "User ID: $id, Username: $username\n";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();