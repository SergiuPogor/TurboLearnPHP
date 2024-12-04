<?php
// Example using password_hash
$password = "user_password123";
$hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
echo $hashedPassword; // Secure password hash (bcrypt)

// Example using crypt
$salt = '$2y$10$' . bin2hex(random_bytes(22)); // bcrypt salt
$hashedPasswordCrypt = crypt($password, $salt); 
echo $hashedPasswordCrypt; // Secure hash using crypt with bcrypt algorithm

// Verifying password with password_hash
if (password_verify($password, $hashedPassword)) {
    echo "Password is valid!";
} else {
    echo "Invalid password!";
}

// Verifying password with crypt
if (crypt($password, $salt) === $hashedPasswordCrypt) {
    echo "Password is valid!";
} else {
    echo "Invalid password!";
}
?>