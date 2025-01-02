<?php

// Connect to MySQL database
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform a query
$query = "SELECT id, name, email, created_at FROM users";
$result = $mysqli->query($query);

// Check if result is valid
if ($result) {
    // Move to the third field (index 2) - email
    mysqli_field_seek($result, 2);

    // Fetch the field information
    $field_info = mysqli_fetch_field($result);
    echo "Field name: " . $field_info->name . "\n"; // Output: email

    // Fetch all rows and show specific column value using mysqli_field_seek
    while ($row = $result->fetch_assoc()) {
        echo "User Email: " . $row[$field_info->name] . "\n";
    }

    // --- Example 2: Using mysqli_field_seek with dynamic field names ---
    $desired_field = 'created_at';
    $field_count = $result->field_count;

    // Loop through fields to find desired one
    for ($i = 0; $i < $field_count; $i++) {
        mysqli_field_seek($result, $i);
        $field_info = mysqli_fetch_field($result);
        if ($field_info->name === $desired_field) {
            echo "Found desired field: " . $field_info->name . "\n";
            break;
        }
    }

    // --- Example 3: Using mysqli_field_seek for advanced data handling ---
    // Let's store all field names in an array
    $field_names = [];
    while ($field_info = mysqli_fetch_field($result)) {
        $field_names[] = $field_info->name;
    }

    // Now, we can use mysqli_field_seek to loop through fields dynamically
    foreach ($field_names as $index => $field_name) {
        mysqli_field_seek($result, $index);
        echo "Processing field: " . $field_name . "\n";
        // Perform operations based on field_name as needed
    }
}

// Close the connection
$mysqli->close();
?>