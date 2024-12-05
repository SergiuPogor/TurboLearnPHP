<?php
// Example: Hashing a password using password_hash
$password = "secret_password"; // User's plain-text password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Store $hashed_password in the database

// Verifying a password using password_verify
$entered_password = "secret_password"; // User entered password for login

if (password_verify($entered_password, $hashed_password)) {
    echo "Password is correct!";
} else {
    echo "Invalid password!";
}
?>