<?php
// Example: Using strtolower to normalize user inputs in PHP

function normalizeUsername(string $username): string {
    return strtolower(trim($username));
}

function normalizeEmail(string $email): string {
    return strtolower(trim($email));
}

// Real-world use case for form submission
$userData = [
    'username' => 'UserName123',
    'email' => 'Example@Email.com',
];

// Normalize data to ensure case-insensitivity in the database
$userData['username'] = normalizeUsername($userData['username']);
$userData['email'] = normalizeEmail($userData['email']);

// Example of usage in conditional check
$storedUsername = 'username123';
$inputUsername = 'UserName123';

if (normalizeUsername($inputUsername) === $storedUsername) {
    echo "Usernames match!";
} else {
    echo "Usernames do not match!";
}

// Alternative way to achieve similar result for multiple fields
function normalizeArrayValues(array $data): array {
    return array_map(fn($value) => strtolower(trim($value)), $data);
}

// Using for emails and usernames stored in an array
$userInputs = ['USERNAME' => 'UserName123', 'EMAIL' => 'Example@Email.com'];
$normalizedInputs = normalizeArrayValues($userInputs);

// Check if normalized email matches
$storedEmail = 'example@email.com';
if ($normalizedInputs['EMAIL'] === $storedEmail) {
    echo "Emails match!";
} else {
    echo "Emails do not match!";
}