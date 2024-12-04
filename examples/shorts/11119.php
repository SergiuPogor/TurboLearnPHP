<?php
// Example 1: Using require (manual inclusion)
require 'classes/User.php';  // Always loads the class

$user = new User();
$user->greet();

// Example 2: Using autoloading (automatically loads when needed)
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php'; // Automatically load required class
});

$user = new User();  // Autoloads 'User.php' when needed
$user->greet();
?>