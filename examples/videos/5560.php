<?php

// Example: Using mysqli_fetch_field_direct() to retrieve column metadata

// Connect to MySQL database
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare a sample query
$query = "SELECT id, name, email FROM users";
$result = $mysqli->query($query);

// Get metadata for the second column (index 1, as it's zero-indexed)
$meta = $result->fetch_field_direct(1);

// Example use-cases in a real application:

// 1. Dynamically determine column types for form generation
if ($meta->type == MYSQLI_TYPE_VAR_STRING) {
    echo "The 'name' field is a VARCHAR. Build an input box.\n";
}

// 2. Validate input lengths based on column metadata
$max_length = $meta->max_length;
echo "The maximum length for 'name' is $max_length characters.\n";

// 3. Dynamically handle column names in reports or dynamic applications
$column_name = $meta->name;
echo "Processing data for the column: $column_name\n";

// 4. Export column details for API documentation generation
$export_details = [
    'field' => $meta->name,
    'type' => $meta->type,
    'max_length' => $meta->max_length
];

// Store field details into a file for documentation purposes
file_put_contents('/tmp/test/column_metadata.json', json_encode($export_details, JSON_PRETTY_PRINT));

// Another use-case: handling multiple columns and their metadata in a loop

$num_fields = $result->field_count;
for ($i = 0; $i < $num_fields; $i++) {
    $field_meta = $result->fetch_field_direct($i);
    
    echo "Column $i: {$field_meta->name} (Type: {$field_meta->type}, Max Length: {$field_meta->max_length})\n";
    
    // Process field-specific logic based on metadata
    if ($field_meta->type == MYSQLI_TYPE_VAR_STRING) {
        echo "Handle string-type logic for {$field_meta->name}\n";
    } elseif ($field_meta->type == MYSQLI_TYPE_LONG) {
        echo "Handle integer-type logic for {$field_meta->name}\n";
    }
}

// Clean up the result set
$result->free();

// Close the database connection
$mysqli->close();

?>