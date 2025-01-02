<?php

// Function to connect to the database
function connectToDatabase($host, $user, $password, $database) {
    $connection = new mysqli($host, $user, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}

// Function to fetch data from the database using mysqli_fetch_array
function fetchUserData($connection) {
    $sql = "SELECT id, name, email FROM users";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch data as an associative array
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            // Display both associative and numeric access
            echo "ID: " . $row['id'] . " - Name: " . $row[1] . " - Email: " . $row['email'] . PHP_EOL;
        }
    } else {
        echo "No results found." . PHP_EOL;
    }
}

// Main execution
$host = 'localhost';
$user = 'root';
$password = 'password';
$database = 'test_db';

$connection = connectToDatabase($host, $user, $password, $database);
fetchUserData($connection);

// Close the database connection
$connection->close();