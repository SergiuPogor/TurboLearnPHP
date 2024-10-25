<?php

// Directory Structure Suggestion for an MVC PHP Application

// Folder: /app
// Structure example:
// ├── app
// │   ├── Controllers
// │   │   ├── UserController.php
// │   │   ├── ProductController.php
// │   │   └── Auth
// │   │       └── LoginController.php
// │   ├── Models
// │   │   ├── User.php
// │   │   ├── Product.php
// │   │   └── Auth
// │   │       └── Session.php
// │   ├── Views
// │   │   ├── User
// │   │   │   └── profile.php
// │   │   └── Product
// │   │       └── catalog.php
// ├── public
// │   └── index.php

// File Example: UserController.php
namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function showProfile(int $userId): void
    {
        // Fetch user data from Model
        $user = User::findById($userId);

        // Render the view and pass data
        $this->render('User/profile', ['user' => $user]);
    }

    private function render(string $view, array $data): void
    {
        // Extract data to variables
        extract($data);

        // Include view file
        require_once __DIR__ . "/../Views/$view.php";
    }
}

// File Example: User.php (Model)
namespace App\Models;

class User
{
    public int $id;
    public string $name;
    public string $email;

    public static function findById(int $id): ?User
    {
        // Simulating database fetch with hardcoded data
        return $id === 1 ? new User(1, 'John Doe', 'john@example.com') : null;
    }

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
}

// File Example: /public/index.php - Entry Point
require_once __DIR__ . '/../app/Controllers/UserController.php';

use App\Controllers\UserController;

$controller = new UserController();
$controller->showProfile(1);