<?php

// Connect to the PostgreSQL database
$dbconn = pg_connect("host=localhost dbname=mydb user=myuser password=mypassword");

// Begin a transaction to ensure safety when deleting a large object
pg_query($dbconn, 'BEGIN');

try {
    // Retrieve the large object OID (Object ID) you want to delete
    $oid = 12345; // This would normally come from your app, e.g., user-uploaded file storage
    
    // Verify that the large object exists before attempting to unlink
    $result = pg_query_params($dbconn, 'SELECT 1 FROM pg_largeobject WHERE loid = $1 LIMIT 1', [$oid]);
    
    if (pg_num_rows($result) > 0) {
        // Unlink the large object (permanently delete it)
        if (pg_lo_unlink($dbconn, $oid)) {
            echo "Large object with OID $oid has been successfully deleted.".PHP_EOL;
        } else {
            echo "Failed to delete large object with OID $oid.".PHP_EOL;
        }
    } else {
        echo "Large object with OID $oid does not exist.".PHP_EOL;
    }

    // Example 2: Deleting multiple large objects that are no longer needed
    $oids_to_delete = [10001, 10002, 10003]; // List of OIDs to be deleted
    foreach ($oids_to_delete as $oid) {
        $result = pg_query_params($dbconn, 'SELECT 1 FROM pg_largeobject WHERE loid = $1 LIMIT 1', [$oid]);
        if (pg_num_rows($result) > 0) {
            if (pg_lo_unlink($dbconn, $oid)) {
                echo "Deleted large object with OID $oid.".PHP_EOL;
            } else {
                echo "Failed to delete OID $oid.".PHP_EOL;
            }
        } else {
            echo "OID $oid does not exist.".PHP_EOL;
        }
    }

    // Example 3: Automatically deleting large objects associated with files older than X days
    $days = 30;
    $query = "
        SELECT loid 
        FROM pg_largeobject_metadata
        WHERE age(creation_time) > interval '$days days'
    ";

    $result = pg_query($dbconn, $query);
    while ($row = pg_fetch_assoc($result)) {
        $oid = $row['loid'];
        if (pg_lo_unlink($dbconn, $oid)) {
            echo "Automatically deleted large object with OID $oid, older than $days days.".PHP_EOL;
        }
    }

    // Commit the transaction after successful deletion
    pg_query($dbconn, 'COMMIT');

} catch (Exception $e) {
    // If an error occurs, roll back the transaction to avoid data corruption
    pg_query($dbconn, 'ROLLBACK');
    echo "An error occurred: ".$e->getMessage().PHP_EOL;
} finally {
    // Close the PostgreSQL connection
    pg_close($dbconn);
}

?>