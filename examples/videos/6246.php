<?php

// First, ensure that MySQLi is available
if (!function_exists('mysqli_get_client_stats')) {
    die("mysqli_get_client_stats function not available on this system.");
}

// Step 1: Establish a database connection using MySQLi
$mysqli = new mysqli('localhost', 'user', 'password', 'database');

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Get client-side MySQL stats using mysqli_get_client_stats
$client_stats = mysqli_get_client_stats();

// Display all available stats
echo "Client stats before queries:\n";
foreach ($client_stats as $stat_key => $stat_value) {
    echo "{$stat_key}: {$stat_value}\n";
}

// Step 3: Perform some database queries to modify stats
$query = "SELECT * FROM users LIMIT 10";
$result = $mysqli->query($query);

$query2 = "INSERT INTO logs (message) VALUES ('Test log entry')";
$result2 = $mysqli->query($query2);

// Check for errors
if ($result === false || $result2 === false) {
    echo "Error: " . $mysqli->error;
} else {
    echo "Queries executed successfully.\n";
}

// Step 4: Get updated client-side MySQL stats after queries
$client_stats_after_queries = mysqli_get_client_stats();

// Display updated stats to see changes
echo "Client stats after queries:\n";
foreach ($client_stats_after_queries as $stat_key => $stat_value) {
    echo "{$stat_key}: {$stat_value}\n";
}

// Advanced Example: Programmatically check and compare changes in key stats

$changes_in_stats = [];
foreach ($client_stats_after_queries as $key => $new_value) {
    if (isset($client_stats[$key]) && $client_stats[$key] != $new_value) {
        $changes_in_stats[$key] = [
            'before' => $client_stats[$key],
            'after' => $new_value
        ];
    }
}

echo "Changes in client stats:\n";
foreach ($changes_in_stats as $key => $values) {
    echo "{$key}: before = {$values['before']}, after = {$values['after']}\n";
}

// Step 5: Close the database connection
$mysqli->close();

// Final Check: Ensure that network traffic stats are updated
if (isset($changes_in_stats['bytes_sent']) || isset($changes_in_stats['bytes_received'])) {
    echo "Network packet stats were successfully updated based on queries executed.\n";
} else {
    echo "No significant network changes detected.\n";
}

?>