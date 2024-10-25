<?php
// Implementing a simple role-based access control system in PHP

class User {
    public $id;
    public $name;
    public $role;

    public function __construct($id, $name, $role) {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role; // e.g. 'admin', 'editor', 'user'
    }
}

class Permission {
    private $permissions = [];

    public function __construct() {
        // Define default permissions for roles
        $this->permissions = [
            'admin' => ['view', 'edit', 'delete'],
            'editor' => ['view', 'edit'],
            'user' => ['view']
        ];
    }

    public function can($role, $action) {
        // Check if the role has the permission for the action
        return in_array($action, $this->permissions[$role] ?? []);
    }
}

// Example of using the User and Permission classes
$user1 = new User(1, "Alice", "admin");
$user2 = new User(2, "Bob", "user");

$permission = new Permission();

// Check permissions for Alice (admin)
if ($permission->can($user1->role, 'delete')) {
    echo $user1->name . " can delete content.\n";
} else {
    echo $user1->name . " cannot delete content.\n";
}

// Check permissions for Bob (user)
if ($permission->can($user2->role, 'edit')) {
    echo $user2->name . " can edit content.\n";
} else {
    echo $user2->name . " cannot edit content.\n";
}

// Adding a dynamic role check
function checkAccess(User $user, $action) {
    global $permission;
    if ($permission->can($user->role, $action)) {
        return "$user->name has access to $action.";
    }
    return "$user->name does not have access to $action.";
}

// Test the dynamic access check
echo checkAccess($user1, 'edit') . "\n";
echo checkAccess($user2, 'view') . "\n";
?>