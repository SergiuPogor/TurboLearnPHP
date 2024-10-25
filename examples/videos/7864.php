<?php

// Basic PHP project structure example

// Root directory
// ├── src                // Source code
// │   ├── Controllers    // Controllers for MVC
// │   ├── Models         // Data models
// │   └── Views          // View templates
// ├── config             // Configuration files
// ├── public             // Publicly accessible files (index.php)
// ├── tests              // Unit tests
// └── vendor             // Composer dependencies

// Autoload classes using Composer
require 'vendor/autoload.php';

// Example of a simple MVC structure

// Namespace declaration for better organization
namespace MyApp\Controllers;

use MyApp\Models\User;

class UserController
{
    public function show($id)
    {
        $user = User::find($id);
        include '../Views/user.php';
    }
}

// User model to interact with database
namespace MyApp\Models;

class User
{
    public static function find($id)
    {
        // Simulate a database fetch
        return [
            'id' => $id,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];
    }
}

// Main entry point (public/index.php)
namespace MyApp;

use MyApp\Controllers\UserController;

// Create a new user controller instance
$controller = new UserController();
$controller->show(1);
?>