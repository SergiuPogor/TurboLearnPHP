<?php

// Database connection setup
$conn = pg_connect("host=localhost dbname=mydb user=myuser password=mypass");

// Function to check if PostgreSQL connection is still alive
function check_pg_connection_status($conn)
{
    $status = pg_connection_status($conn);
    
    if ($status === PGSQL_CONNECTION_OK) {
        echo "Connection is still active.";
    } else {
        // Connection is broken or in a bad state
        echo "WARNING: Connection is broken!";
        // Attempting to reset or reconnect
        reconnect_pg($conn);
    }
}

// Function to reconnect if connection is broken
function reconnect_pg(&$conn)
{
    // Close the current connection
    pg_close($conn);

    // Reconnect logic (may vary depending on use case)
    $conn = pg_connect("host=localhost dbname=mydb user=myuser password=mypass");

    if (pg_connection_status($conn) === PGSQL_CONNECTION_OK) {
        echo "Reconnection successful.";
    } else {
        echo "Reconnection failed. Check server or credentials.";
    }
}

// Simulate connection loss or long idle times
sleep(5); // Simulate waiting or long operation

// Check the connection status before running a query
check_pg_connection_status($conn);

// Example use-case: Run queries safely only if connection is alive
if (pg_connection_status($conn) === PGSQL_CONNECTION_OK) {
    $result = pg_query($conn, "SELECT * FROM users");

    if ($result) {
        // Fetch data
        while ($row = pg_fetch_assoc($result)) {
            print_r($row);
        }
    }
} else {
    echo "Cannot run query, connection is not active.";
}

// Another way to handle this using exceptions
try {
    // Example: Trying to run a query without checking
    $result = pg_query($conn, "SELECT * FROM orders");
    
    if (!$result) {
        throw new Exception('Query failed or connection lost');
    }

    // Process query result
    while ($row = pg_fetch_assoc($result)) {
        print_r($row);
    }
} catch (Exception $e) {
    // Handle exception gracefully
    echo "Error: " . $e->getMessage();
    // Attempt to reconnect if necessary
    reconnect_pg($conn);
}

// Don't forget to close the connection after operations
pg_close($conn);

?>