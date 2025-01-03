<?php

// Establish a MySQLi connection
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform a query that fetches multiple columns
$query = "SELECT id, name, email FROM users";
$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

// Use-case 1: Get the field cursor position
$field_position = mysqli_field_tell($result);
echo "Initial field cursor position: $field_position" . PHP_EOL;

// Fetch the first field's metadata
$field = $result->fetch_field();
echo "Fetched field: " . $field->name . PHP_EOL;

// After fetching the first field, check the cursor position again
$field_position = mysqli_field_tell($result);
echo "Field cursor after fetching the first field: $field_position" . PHP_EOL;

// Use-case 2: Iterate through all fields and track cursor position
while ($field = $result->fetch_field()) {
    $current_position = mysqli_field_tell($result);
    echo "Field at position $current_position: " . $field->name . PHP_EOL;
}

// Use-case 3: Rewind to the first field by resetting result and fetching again
$result->field_seek(0);
$field = $result->fetch_field();
echo "Rewound to first field: " . $field->name . PHP_EOL;
echo "Cursor reset to: " . mysqli_field_tell($result) . PHP_EOL;

// Use-case 4: Simulate dynamic field fetching based on cursor position
$field_position = mysqli_field_tell($result);
if ($field_position == 0) {
    // Fetch additional metadata if we're at the start of the field list
    $extra_metadata = $mysqli->query("SHOW COLUMNS FROM users");
    while ($meta = $extra_metadata->fetch_assoc()) {
        echo "Metadata: " . $meta['Field'] . " - " . $meta['Type'] . PHP_EOL;
    }
}

// Cleanup the result and close connection
$result->free();
$mysqli->close();

// Advanced: Tracking field cursor across multiple result sets
$mysqli = new mysqli('localhost', 'user', 'password', 'database');
$query1 = "SELECT id, username FROM users";
$query2 = "SELECT product_id, product_name FROM products";

$multi_query = "$query1; $query2";
if ($mysqli->multi_query($multi_query)) {
    do {
        if ($result = $mysqli->store_result()) {
            // Fetch fields from each result set
            while ($field = $result->fetch_field()) {
                $cursor_position = mysqli_field_tell($result);
                echo "Field: " . $field->name . " at cursor position: $cursor_position" . PHP_EOL;
            }
            $result->free();
        }
    } while ($mysqli->next_result());
}

$mysqli->close();

?>