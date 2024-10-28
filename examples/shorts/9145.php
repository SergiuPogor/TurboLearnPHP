<?php

// Basic constant definition
define('APP_NAME', 'MyAwesomeApp');

// Using class constants
class AppConfig {
    public const MAX_USERS = 1000;
    public const DB_HOST = 'localhost';
    public const DB_NAME = 'app_db';
    
    // Static method utilizing a constant
    public static function getDbCredentials(): array {
        return [
            'host' => self::DB_HOST,
            'name' => self::DB_NAME,
            'max_users' => self::MAX_USERS
        ];
    }
}

// Namespaced constant for modular code structure
namespace MyApp\Config;

const API_KEY = 'a1b2c3-secret-key';
const API_ENDPOINT = 'https://api.example.com';

// Demonstrating constant usage
function fetchData() {
    return [
        'app' => \APP_NAME,
        'api_key' => API_KEY,
        'endpoint' => API_ENDPOINT
    ];
}

// Advanced usage in practice
$settings = AppConfig::getDbCredentials();
$apiData = \MyApp\Config\fetchData();