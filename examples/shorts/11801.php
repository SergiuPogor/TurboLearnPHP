<?php
// Comparing password_hash vs md5 for secure password storage

// Example 1: Using password_hash (recommended method)
$password = 'supersecret';
$hashedPassword = password_hash($password, PASSWORD_BCRYPT); // bcrypt used for security

// Example 2: Storing and verifying the hashed password
if (password_verify($password, $hashedPassword)) {
    echo "Password is correct!";
} else {
    echo "Invalid password!";
}

// Example 3: Using md5 (unsafe for passwords)
$md5HashedPassword = md5($password); // not recommended, weak and vulnerable

// Example 4: Securely comparing passwords using password_hash
$storedPassword = '$2y$10$VvZ2St57hjs5eZbbHU8flvRtVwzZJdce2zY0/BzYNtP6pYlWu0qF6'; // previously hashed password
if (password_verify($password, $storedPassword)) {
    echo "Password is correct!";
} else {
    echo "Invalid password!";
}
?>