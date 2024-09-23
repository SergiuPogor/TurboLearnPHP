<?php

// Function to check socket readiness for a PostgreSQL connection
function checkPgSocketStatus($connection) {
    // Ensure the connection resource is valid
    if (!$connection) {
        die("Invalid PostgreSQL connection.");
    }

    // Use pg_socket_poll to check socket status
    $status = pg_socket_poll($connection);

    // Check if pg_socket_poll returned a valid status
    if ($status === false) {
        die("Failed to poll socket.");
    } elseif ($status === 0) {
        echo "Socket is not ready yet." . PHP_EOL;
    } elseif ($status === 1) {
        echo "Socket is ready for reading or writing." . PHP_EOL;
    } else {
        echo "Unknown socket status." . PHP_EOL;
    }
}

// Connect to PostgreSQL database
$connection = pg_connect("host=localhost dbname=mydb user=myuser password=mypassword");

// Check the socket status
checkPgSocketStatus($connection);

// Close the connection
pg_close($connection);

?>