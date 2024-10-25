<?php

// Example of securely storing and verifying passwords using password_hash and password_verify

// Folder '/tmp/test/' must exist
$passwordFile = '/tmp/test/stored_passwords.txt';

// Function to hash and store a password
function storePassword(string $username, string $password): void
{
    global $passwordFile;

    // Hash the password with default cost
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Store username and hashed password in a file (simulating a database)
    $entry = $username . ':' . $hashedPassword . PHP_EOL;
    file_put_contents($passwordFile, $entry, FILE_APPEND);
}

// Function to verify a user's password
function verifyPassword(string $username, string $password): bool
{
    global $passwordFile;

    // Read stored passwords (simulated database)
    $entries = file($passwordFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($entries as $entry) {
        [$storedUser, $storedHash] = explode(':', $entry);

        // Check if username matches
        if ($username === $storedUser) {
            // Verify the password using password_verify
            return password_verify($password, $storedHash);
        }
    }

    // Username not found
    return false;
}

// Password rehashing example if algorithm parameters have changed
function rehashPassword(string $username, string $password): void
{
    global $passwordFile;

    $entries = file($passwordFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $newEntries = [];

    foreach ($entries as $entry) {
        [$storedUser, $storedHash] = explode(':', $entry);

        if ($username === $storedUser && password_verify($password, $storedHash)) {
            // Check if the password needs rehashing (e.g., if algorithm settings have changed)
            if (password_needs_rehash($storedHash, PASSWORD_DEFAULT)) {
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $newEntries[] = $username . ':' . $newHash;
            } else {
                $newEntries[] = $entry;
            }
        } else {
            $newEntries[] = $entry;
        }
    }

    // Rewrite file with updated password hashes
    file_put_contents($passwordFile, implode(PHP_EOL, $newEntries) . PHP_EOL);
}

// Testing the functions
storePassword('john_doe', 'secret123'); // Hash and store password
storePassword('jane_doe', 'mypassword'); // Another user

// Verify password
if (verifyPassword('john_doe', 'secret123')) {
    echo "Password verified successfully for john_doe.\n";
} else {
    echo "Invalid password for john_doe.\n";
}

// Rehash password if necessary
rehashPassword('john_doe', 'secret123'); // Updates hash if needed

// Note: In a real-world application, passwords would be stored in a database, and user data should be protected from exposure.
?>