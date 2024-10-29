<?php

// Defining constants in a config file for global access
define('APP_NAME', 'My Awesome App');
define('MAX_USERS', 100);

// Using constants in your application
function displayAppInfo() {
    echo "Welcome to " . APP_NAME . "!\n";
    echo "Maximum number of users allowed: " . MAX_USERS . "\n";
}

// Call the function to display information
displayAppInfo();

// Defining constants within a class
class AppConfig {
    const VERSION = '1.0.0';
    const SUPPORT_EMAIL = 'support@myawesomeapp.com';
}

// Accessing class constants
echo "App Version: " . AppConfig::VERSION . "\n";
echo "Support Email: " . AppConfig::SUPPORT_EMAIL . "\n";

// Defining constants in a namespace
namespace MyApp\Config;

const API_URL = 'https://api.myawesomeapp.com';
const TIMEOUT = 30;

// Accessing namespace constants
echo "API URL: " . API_URL . "\n";
echo "Request Timeout: " . TIMEOUT . " seconds\n";