<?php

// MySQL connection details
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to fetch all rows, but we are interested only in one column
$query = "SELECT email FROM users WHERE status = 'active'";
$stmt = $mysqli->prepare($query);
if (!$stmt) {
    die("Error preparing statement: " . $mysqli->error);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Fetch a single column using mysqli_fetch_column()
// This function fetches the value of a specific column from the result set
while ($email = $result->fetch_column(0)) {  // 0 represents the first column
    // Store or process the email addresses
    echo "Email: $email" . PHP_EOL;
}

// --- Multiple ways to fetch columns with mysqli_fetch_column() ---

// Example 1: Fetching another column by changing the query
$query2 = "SELECT username FROM users WHERE status = 'inactive'";
$stmt2 = $mysqli->prepare($query2);
$stmt2->execute();
$result2 = $stmt2->get_result();

while ($username = $result2->fetch_column(0)) {
    // Process or display usernames
    echo "Inactive Username: $username" . PHP_EOL;
}

// Example 2: Fetch a specific column by index, not by query change
$query3 = "SELECT id, email, registration_date FROM users";
$stmt3 = $mysqli->prepare($query3);
$stmt3->execute();
$result3 = $stmt3->get_result();

// Fetch only the second column (email) without adjusting the query itself
while ($emailColumn = $result3->fetch_column(1)) {  // 1 represents the second column
    // Process or display the emails from the second column
    echo "User Email: $emailColumn" . PHP_EOL;
}

// --- Handling errors and exceptions ---

// Always ensure to handle cases where no result is returned
if (!$result3) {
    die("Query failed: " . $mysqli->error);
}

// Clean up: Closing statements and connection
$stmt->close();
$stmt2->close();
$stmt3->close();
$mysqli->close();

// --- Use-case: Fetching columns from a file import process ---
// Let's assume you have imported a large CSV into a MySQL table and only need the IDs

$query4 = "SELECT id FROM large_imported_data";
$stmt4 = $mysqli->prepare($query4);
$stmt4->execute();
$result4 = $stmt4->get_result();

// Using fetch_column() to retrieve only the 'id' column
while ($id = $result4->fetch_column(0)) {
    // Process the IDs, e.g., saving them to a log
    echo "Processed ID: $id" . PHP_EOL;
}

// Closing final statement and connection
$stmt4->close();
$mysqli->close();

?>