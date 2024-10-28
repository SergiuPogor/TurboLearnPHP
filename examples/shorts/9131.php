<?php

// Example of using parse_ini_file() to load configuration settings
$iniFilePath = '/tmp/test/config.ini'; // Path to your INI file

// Load configuration settings
$config = parse_ini_file($iniFilePath, true); // true for multi-section support

// Accessing configuration values
$dbHost = $config['database']['host']; // Database host
$dbUser = $config['database']['user']; // Database user
$dbPass = $config['database']['password']; // Database password

// Using the configuration values to connect to the database
$dsn = "mysql:host=$dbHost;dbname=my_database;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Example of config.ini structure
/*
[database]
host = "localhost"
user = "root"
password = "secret"
*/

?>