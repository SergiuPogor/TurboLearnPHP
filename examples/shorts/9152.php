<?php
// Example of preventing timing attacks with hash_equals()

// Securely comparing a user-supplied password against a stored hash
$userInput = 'password123'; // User input
$storedHash = '$2y$10$EIXZ/O1wN2Fd1N8P2nC4IeTgC5dEauUlqWz4gN09vKlE3AQI4t3Iu'; // Example hashed password

// Using hash_equals to compare the password safely
if (hash_equals($storedHash, password_hash($userInput, PASSWORD_DEFAULT))) {
    echo 'Password is correct!';
} else {
    echo 'Invalid password.';
}

// Example of token validation
$expectedToken = 'abc123xyz';
$providedToken = $_GET['token'] ?? ''; // Assume the token comes from a GET request

// Securely compare the provided token with the expected token
if (hash_equals($expectedToken, $providedToken)) {
    echo 'Token is valid!';
} else {
    echo 'Invalid token.';
}