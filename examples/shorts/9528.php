<?php

// Example PHP code demonstrating basic security practices
function secureUserInput($input) {
    // Trim whitespace
    $input = trim($input);
    // Remove slashes
    $input = stripslashes($input);
    // Convert to HTML entities
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

// Simulating user input from a form
$userInput = "<script>alert('Hacked!');</script>";
$safeInput = secureUserInput($userInput);

// Display safe input
echo "<p>User Input: {$safeInput}</p>";

// Example of SQL injection prevention
function prepareUserData($conn, $username, $password) {
    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    // Securely bind parameters
    $stmt->bind_param("ss", $username, password_hash($password, PASSWORD_DEFAULT));
    // Execute the statement
    $stmt->execute();
}

// Database connection (assuming $conn is your mysqli connection)
// prepareUserData($conn, $safeUsername, $safePassword);