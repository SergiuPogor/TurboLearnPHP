<?php

// Function to create a secure MySQL connection using mysqli_init
function createSecureConnection($host, $user, $password, $dbname) {
    // Initialize mysqli
    $mysqli = mysqli_init();

    // Set connection options
    if (!$mysqli) {
        die('mysqli_init failed');
    }

    // Set the options for error handling
    mysqli_options($mysqli, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
    mysqli_options($mysqli, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    
    // Establish the connection
    if (!mysqli_real_connect($mysqli, $host, $user, $password, $dbname)) {
        die('Connect Error: ' . mysqli_connect_error());
    }

    return $mysqli;
}

// Example usage
$host = 'localhost';
$user = 'db_user';
$password = 'secure_password';
$dbname = 'test_db';

$connection = createSecureConnection($host, $user, $password, $dbname);
echo "Connection successful!\n";

// Example of executing a query
$query = "SELECT * FROM users WHERE status = ?";
$stmt = mysqli_prepare($connection, $query);

$status = 'active';
mysqli_stmt_bind_param($stmt, 's', $status);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch results
while ($row = mysqli_fetch_assoc($result)) {
    echo "User: " . $row['username'] . "\n";
}

// Clean up
mysqli_stmt_close($stmt);
mysqli_close($connection);

?>