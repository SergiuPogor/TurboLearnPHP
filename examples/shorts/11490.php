<?php
// Example 1: Using $_POST to handle form submission securely
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];  // Data is sent securely
    $password = $_POST['password'];
    echo "Username: " . $username . "\n";
    // Process the password securely (e.g., hashing it)
}

// Example 2: Using $_GET to pass data in the URL (e.g., search queries)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search = $_GET['search'];  // Data is visible in the URL
    echo "Searching for: " . htmlspecialchars($search);
}
?>