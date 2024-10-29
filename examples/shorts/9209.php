<?php
// Example of safely storing and verifying user passwords in PHP

function registerUser(string $username, string $password): void {
    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Here you would typically save $username and $hashedPassword to the database
    // Example: saveToDatabase($username, $hashedPassword);
}

function loginUser(string $username, string $password): bool {
    // Here you would typically fetch the hashed password from the database
    // Example: $hashedPassword = fetchHashedPasswordFromDatabase($username);

    // For demo, let's assume we fetched this hashed password
    $hashedPassword = '$2y$10$E9...'; // Example hashed password

    // Verify the provided password against the stored hash
    if (password_verify($password, $hashedPassword)) {
        return true; // Successful login
    } else {
        return false; // Login failed
    }
}

// Example usage
try {
    registerUser('testUser', 'securePassword123');
    if (loginUser('testUser', 'securePassword123')) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>