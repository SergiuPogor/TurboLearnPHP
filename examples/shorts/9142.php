<?php

// Handling undefined variables in PHP with isset()

// Bad Practice: Directly accessing an undefined variable
function getUserData() {
    // This will trigger a PHP warning and may cause unexpected issues
    return $userData['name'];
}

// Better Practice: Using isset() to check if the variable exists
function getUserDataSafe() {
    global $userData;
    return isset($userData['name']) ? $userData['name'] : 'Guest'; // avoids undefined warning
}

// Improved: Using ?? (null coalescing) operator, shorthand for isset() + check
function getUserDataCoalesce() {
    global $userData;
    return $userData['name'] ?? 'Guest'; // clean and readable, avoids undefined warning
}

// Example: Checking multiple potential undefined variables with conditional initialization
function loadConfig() {
    global $config;
    $apiKey = $config['api_key'] ?? 'default_key';
    $timezone = $config['timezone'] ?? 'UTC';
    
    return [
        'api_key' => $apiKey,
        'timezone' => $timezone
    ];
}

// Demonstrating safe access in practice
$config = ['api_key' => '123abc'];
print_r(loadConfig()); // safely loads config without undefined warnings