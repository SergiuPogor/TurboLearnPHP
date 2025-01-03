<?php
// Establishing MySQLi connection
$mysqli = new mysqli("localhost", "username", "password", "database_name");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Example query
$query = "SELECT id, name, email FROM users";
$result = $mysqli->query($query);

// Fetching field information
if ($result) {
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo "Field Name: " . $field->name . "\n";
        echo "Field Type: " . $field->type . "\n";
        echo "Max Length: " . $field->length . "\n";
        echo "Flags: " . $field->flags . "\n";
        echo "-------------------------------------\n";
    }
}

// Free result set and close connection
$result->free();
$mysqli->close();
?>