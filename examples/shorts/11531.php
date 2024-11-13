<?php

// Comparing strpos vs strstr: Optimizing String Searches

// Sample data: list of user emails
$emails = [
    'alice@example.com',
    'bob@gmail.com',
    'carol@yahoo.com',
    'dave@outlook.com',
    'eve@protonmail.com'
];

$searchDomain = '@gmail.com';

// 1. Using strpos to check if email is from Gmail (fastest)
$gmailUsers = array_filter($emails, function ($email) use ($searchDomain) {
    return strpos($email, $searchDomain) !== false;
});
print_r($gmailUsers);

// 2. Using strstr to extract the domain and filter emails (slower)
$gmailUsersWithStrstr = array_filter($emails, function ($email) use ($searchDomain) {
    return strstr($email, $searchDomain) !== false;
});
print_r($gmailUsersWithStrstr);

// 3. Real-life use-case: Reading data from a file and filtering lines with a specific keyword
$filePath = '/tmp/test/input.txt';
if (file_exists($filePath)) {
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Using strpos to quickly check for the presence of "error"
    $errorLines = array_filter($lines, fn($line) => strpos($line, 'error') !== false);
    print_r($errorLines);
}
?>