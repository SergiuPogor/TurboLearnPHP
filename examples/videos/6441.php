<?php

// Connecting to MySQL using mysqli
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get and display host information
$hostInfo = $mysqli->get_host_info();
echo "Connected to MySQL host: $hostInfo\n";

// Example of using mysqli_get_host_info in a function
function checkConnection($mysqli) {
    // Fetch the host info
    $hostInfo = $mysqli->get_host_info();
    
    // Log or display the host info
    echo "Currently connected to: $hostInfo\n";
    
    // You can use this info to debug your connection
    if (strpos($hostInfo, 'localhost') !== false) {
        echo "You are connected to the local database.\n";
    } else {
        echo "Warning: You are connected to a remote database!\n";
    }
}

// Call the function to check connection info
checkConnection($mysqli);

// Closing the connection
$mysqli->close();
?>