<?php
// This script demonstrates how to safely remove large objects from PostgreSQL using pg_lounlink().
// Ensure that you have the necessary permissions and error handling in place.

function removeLargeObject($connection, $oid) {
    // Check if the OID is valid
    if (!is_numeric($oid)) {
        throw new InvalidArgumentException('Invalid OID provided.');
    }

    // Begin a transaction
    pg_query($connection, "BEGIN");
    
    // Attempt to unlink the large object
    $result = pg_lounlink($connection, $oid);
    
    if ($result === false) {
        // Rollback the transaction if the unlink fails
        pg_query($connection, "ROLLBACK");
        throw new Exception('Failed to unlink the large object with OID: ' . $oid);
    }

    // Commit the transaction if successful
    pg_query($connection, "COMMIT");
    return true;
}

try {
    // Example usage
    $connection = pg_connect("host=localhost dbname=mydb user=myuser password=mypassword");

    // Assuming you have the OID of the large object you want to remove
    $largeObjectOid = 12345; // Replace with your actual OID

    // Call the function to remove the large object
    if (removeLargeObject($connection, $largeObjectOid)) {
        echo "Large object with OID $largeObjectOid successfully removed.";
    }

} catch (Exception $e) {
    // Handle exceptions and display an error message
    echo "Error: " . $e->getMessage();
} finally {
    // Close the database connection
    if (isset($connection)) {
        pg_close($connection);
    }
}