<?php

// Example: Using filter_var() for advanced input validation and sanitization

// Scenario 1: Validate an email with strict rules

$email = "user@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Email is valid
    // Handle the email
}

// But what about emails with tricky cases like "test@subdomain.example.com"?

$email2 = "test@subdomain.example.com";
if (filter_var($email2, FILTER_VALIDATE_EMAIL)) {
    // Even subdomain emails pass the validation!
}

// Scenario 2: Sanitize URLs before storing or using them

$url = "https://www.example.com/search?query=<script>alert('XSS')</script>";
$sanitizedUrl = filter_var($url, FILTER_SANITIZE_URL);

// Sanitize user input to remove XSS vulnerabilities

echo $sanitizedUrl; // Prints: https://www.example.com/search?query=alert('XSS')

// Scenario 3: Use custom filters for validation, like validating IP addresses

$ip = "192.168.1.1"; // Local network IP

if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)) {
    // IP is valid and not in a private range
} else {
    // Private or invalid IP, reject or log
}

// Validate IPv6 addresses
$ipv6 = "fe80::1ff:fe23:4567:890a";
if (filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    // Valid IPv6 address
}

// Scenario 4: Prevent common validation mistakes like allowing fake URLs

$invalidUrl = "htp://wrong-protocol.com";
if (!filter_var($invalidUrl, FILTER_VALIDATE_URL)) {
    // Invalid URL due to incorrect protocol
}

// Scenario 5: Validate a custom URL scheme, like "ftp://"

$customUrl = "ftp://example.com/resource";
if (filter_var($customUrl, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
    // Valid FTP URL
}

// Scenario 6: Prevent SQL injections by sanitizing string inputs before using them in queries

$unsafeString = "'; DROP TABLE users; --";
$safeString = filter_var($unsafeString, FILTER_SANITIZE_STRING);

// Now safeString can be used in SQL queries safely

// Scenario 7: Filter and validate a JSON input to ensure it's correctly formatted

$jsonInput = '{"name":"John","age":30}';
if (filter_var($jsonInput, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^{.*}$/"]])) {
    // Valid JSON format
}

// Scenario 8: Use filter_var to dynamically filter multiple types of input at once

$userInput = [
    'email' => 'john@example.com',
    'ip' => '256.256.256.256', // Invalid IP
    'url' => 'https://www.example.com',
    'age' => 'not a number',
];

// Define a filter map for each type of input
$filterMap = [
    'email' => FILTER_VALIDATE_EMAIL,
    'ip' => FILTER_VALIDATE_IP,
    'url' => FILTER_VALIDATE_URL,
    'age' => FILTER_VALIDATE_INT,
];

// Validate and filter the input data
$validatedInput = filter_var_array($userInput, $filterMap);

// Check validation results for each field
if ($validatedInput['email'] === false) {
    // Invalid email
}

if ($validatedInput['ip'] === false) {
    // Invalid IP
}

if ($validatedInput['age'] === false) {
    // Invalid age
}

// Scenario 9: Advanced custom validation using a regular expression

$customInput = 'abc-123';
if (filter_var($customInput, FILTER_VALIDATE_REGEXP, [
    'options' => ['regexp' => '/^[a-z]{3}-\d{3}$/']
])) {
    // Custom input is valid
}

// Scenario 10: Combining multiple flags to ensure data integrity

$emailWithFlags = "user@domain.com";
if (filter_var($emailWithFlags, FILTER_VALIDATE_EMAIL | FILTER_FLAG_EMAIL_UNICODE)) {
    // Valid email with Unicode support
}

?>