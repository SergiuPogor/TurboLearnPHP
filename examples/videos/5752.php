<?php
// Connect to the MySQL database using mysqli
$host = 'localhost';
$user = 'username'; // replace with your DB username
$password = 'password'; // replace with your DB password
$database = 'database_name'; // replace with your DB name

$connection = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Perform a sample query
$query = "SELECT id, name, email FROM users"; // Change table name and fields as needed
$result = $connection->query($query);

// Check if the query was successful
if ($result) {
    // Get the number of fields in the result set
    $numFields = mysqli_num_fields($result);
    
    // Prepare an array to hold field names
    $fieldNames = [];
    
    // Fetch field information
    for ($i = 0; $i < $numFields; $i++) {
        $fieldInfo = $result->fetch_field_direct($i);
        $fieldNames[] = $fieldInfo->name;
    }
    
    // Display field names
    echo "Fields in the result set: " . implode(', ', $fieldNames) . "\n";

    // Example of using field count in a loop
    while ($row = $result->fetch_assoc()) {
        echo "Row data:\n";
        foreach ($fieldNames as $field) {
            echo "$field: " . $row[$field] . "\n";
        }
        echo "------\n";
    }
} else {
    echo "Query error: " . $connection->error;
}

// Close the database connection
$connection->close();
?>