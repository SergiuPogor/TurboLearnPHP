<?php

// Create a new MySQLi connection
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Prepare a SELECT statement using prepared statements
$stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE status = ?");

// Bind a parameter to the statement
$status = 'active';
$stmt->bind_param('s', $status);

// Execute the statement
$stmt->execute();

// Bind the result variables
$stmt->bind_result($id, $name, $email);

// Fetch the data using mysqli_stmt_fetch()
while ($stmt->fetch()) {
    // This fetches data into the bound variables ($id, $name, $email)
    echo "User ID: $id, Name: $name, Email: $email\n";
}

// Another example: Using an array to dynamically bind and fetch multiple results

// Prepare a more complex statement
$stmt = $mysqli->prepare("SELECT id, name, role, email FROM users WHERE role IN (?, ?)");

// Dynamically binding parameters
$role1 = 'admin';
$role2 = 'editor';
$stmt->bind_param('ss', $role1, $role2);

// Execute again
$stmt->execute();

// Dynamically bind the result to an array
$results = [];
$stmt->bind_result($id, $name, $role, $email);

while ($stmt->fetch()) {
    $results[] = [
        'id' => $id,
        'name' => $name,
        'role' => $role,
        'email' => $email
    ];
}

// Output result set from the array
foreach ($results as $user) {
    echo "ID: {$user['id']}, Name: {$user['name']}, Role: {$user['role']}, Email: {$user['email']}\n";
}

// Advanced Case: Fetching in bulk using dynamic variable binding
$stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE role = ?");

// Binding a dynamic role
$role = 'subscriber';
$stmt->bind_param('s', $role);

// Execute the statement
$stmt->execute();

// Get the metadata for the fields
$meta = $stmt->result_metadata();

// Dynamically bind results to an array of variables
$fields = [];
while ($field = $meta->fetch_field()) {
    $fields[] = &$row[$field->name];
}

// Bind the result dynamically
call_user_func_array([$stmt, 'bind_result'], $fields);

// Fetch results into the array dynamically
while ($stmt->fetch()) {
    foreach ($row as $key => $val) {
        echo "$key: $val\n";
    }
}

// Close statement and connection
$stmt->close();
$mysqli->close();
?>