<?php

// Function to create a hashed password
function createHashedPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify the password against the hash
function verifyPassword($inputPassword, $hashedPassword) {
    return password_verify($inputPassword, $hashedPassword);
}

// Example usage
$password = 'my_secure_password'; 
$hashedPassword = createHashedPassword($password); // Hash the password

// Simulate user input for login
$userInput = 'my_secure_password'; 

if (verifyPassword($userInput, $hashedPassword)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}

?>