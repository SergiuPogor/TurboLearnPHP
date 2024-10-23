<?php

// Function to get field types using pg_field_type_oid
function getFieldTypes($connection, $tableName) {
    $fieldTypes = [];
    
    // Query to get the column names and their respective types
    $query = "SELECT column_name, data_type 
              FROM information_schema.columns 
              WHERE table_name = $1";
    $result = pg_query_params($connection, $query, [$tableName]);

    if (!$result) {
        throw new Exception('Query failed: ' . pg_last_error($connection));
    }

    // Fetching field type OIDs
    while ($row = pg_fetch_assoc($result)) {
        $fieldName = $row['column_name'];
        $dataType = pg_field_type_oid($result, $fieldName); // Get the OID of the field type
        
        // Store field name with its OID
        $fieldTypes[$fieldName] = $dataType;
    }

    return $fieldTypes; // Return an associative array of field names and their OIDs
}

// Example usage
$connection = pg_connect("host=localhost dbname=mydb user=myuser password=mypass"); // Connect to PostgreSQL

$tableName = 'my_table'; // Specify the table name
$fieldTypes = getFieldTypes($connection, $tableName); // Get field types
print_r($fieldTypes); // Output the field types with OIDs

pg_close($connection); // Close the connection