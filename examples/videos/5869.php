<?php

// Database connection
$mysqli = new mysqli('localhost', 'username', 'password', 'database_name');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sample query to get data from a table
$query = "SELECT * FROM users";
$result = $mysqli->query($query);

// Fetch field metadata using mysqli_fetch_field
if ($result) {
    // Loop through the fields and display metadata
    while ($field = $result->fetch_field()) {
        echo "Field Name: " . $field->name . "\n"; // Name of the field
        echo "Table: " . $field->table . "\n"; // Table name
        echo "Type: " . $field->type . "\n"; // Data type
        echo "Max Length: " . $field->max_length . "\n"; // Maximum length
        echo "Flags: " . $field->flags . "\n\n"; // Field flags
    }
} else {
    echo "Query failed: " . $mysqli->error;
}

// Dynamic data processing based on field type
$results_array = [];
while ($row = $result->fetch_assoc()) {
    $processed_row = [];
    foreach ($row as $key => $value) {
        // Use field metadata to handle data differently
        $field_info = $result->fetch_field_direct($key);
        if ($field_info->type === MYSQLI_TYPE_STRING) {
            $processed_row[$key] = strtoupper($value); // Convert strings to uppercase
        } elseif ($field_info->type === MYSQLI_TYPE_INT) {
            $processed_row[$key] = $value + 1; // Increment integers by 1
        } else {
            $processed_row[$key] = $value; // Keep other types unchanged
        }
    }
    $results_array[] = $processed_row; // Store processed row
}

// Display processed data
foreach ($results_array as $processed) {
    print_r($processed);
}

// Closing the connection
$mysqli->close();
?>