<?php

// Create a new mysqli connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare multiple queries
$sql1 = "SELECT id, name FROM users";
$sql2 = "SELECT id, title FROM posts";

// Execute first query
if ($mysqli->query($sql1)) {
    $result1 = $mysqli->store_result();
    
    // Fetch results
    while ($row = $result1->fetch_assoc()) {
        echo "User ID: " . $row["id"] . " - Name: " . $row["name"] . "\n";
    }
}

// Move to the next result set
if ($mysqli->next_result()) {
    // Execute second query
    if ($mysqli->query($sql2)) {
        $result2 = $mysqli->store_result();
        
        // Fetch results
        while ($row = $result2->fetch_assoc()) {
            echo "Post ID: " . $row["id"] . " - Title: " . $row["title"] . "\n";
        }
    }
}

// Free results and close the connection
$result1->free();
$result2->free();
$mysqli->close();

?>