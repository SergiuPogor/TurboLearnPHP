<?php

// Connect to PostgreSQL database
$connection = pg_connect("host=localhost dbname=mydb user=myuser password=mypassword");

if (!$connection) {
    die("Connection to database failed.");
}

// Perform a query to fetch some data
$query = "SELECT id, name, email FROM users";
$result = pg_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Get the number of fields in the result
    $fieldCount = pg_num_fields($result);
    
    // Loop through the fields to get their names
    for ($i = 0; $i < $fieldCount; $i++) {
        $fieldName = pg_field_name($result, $i);
        echo "Field #$i: $fieldName\n";
    }
} else {
    echo "Query failed: " . pg_last_error($connection);
}

// Free the result resource
pg_free_result($result);

// Close the connection
pg_close($connection);

?>