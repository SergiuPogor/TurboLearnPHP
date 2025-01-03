<?php

// Database connection parameters
$host = 'localhost';
$username = 'db_user';
$password = 'db_password';
$database = 'example_db';

// Create a new MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Set the character set to UTF-8 for this connection
$mysqli->set_charset("utf8");

// Retrieve the current character set
$charset_info = $mysqli->get_charset();

// Display the current character set
echo "Current character set: " . $charset_info->charset . "\n";
echo "Collation: " . $charset_info->collation . "\n";

// Example function to insert data safely
function insertData($mysqli, $data) {
    // Prepare statement to prevent SQL injection
    $stmt = $mysqli->prepare("INSERT INTO test_table (text_column) VALUES (?)");
    
    // Bind the parameter (s for string)
    $stmt->bind_param("s", $data);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!\n";
    } else {
        echo "Error inserting data: " . $stmt->error . "\n";
    }
    
    // Close the statement
    $stmt->close();
}

// Example usage of inserting data
insertData($mysqli, "Hello, world! 🌍");

// Close the MySQLi connection
$mysqli->close();
?>