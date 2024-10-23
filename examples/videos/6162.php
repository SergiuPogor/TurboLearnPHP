<?php

// Database connection parameters
$dbconn = pg_connect("host=localhost dbname=mydb user=myuser password=mypassword");

// Function to fetch specific column data
function fetch_column_data($query, $column_index) {
    // Execute the query
    $result = pg_query($query);
    
    if (!$result) {
        return []; // Return empty if query fails
    }

    // Fetch the specified column from the result set
    return pg_fetch_all_columns($result, $column_index);
}

// Example usage
$query = "SELECT id, name, email FROM users";
$column_index = 1; // Fetching the 'name' column

// Get the column data
$names = fetch_column_data($query, $column_index);

// Displaying the names
foreach ($names as $name) {
    echo "Name: " . htmlspecialchars($name) . "\n";
}

// Example of fetching another column
$column_index = 2; // Fetching the 'email' column
$emails = fetch_column_data($query, $column_index);

// Displaying the emails
foreach ($emails as $email) {
    echo "Email: " . htmlspecialchars($email) . "\n";
}

// Close the database connection
pg_close($dbconn);

?>