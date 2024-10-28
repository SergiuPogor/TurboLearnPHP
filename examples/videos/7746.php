<?php

session_start(); // Start a session for user authentication management

// Database connection setup (using PDO for security)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=secure_app', 'root', 'password', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Register User with Password Hashing
function registerUser($username, $password) {
    global $pdo;
    $hash = password_hash($password, PASSWORD_BCRYPT); // Bcrypt hashing for strong password storage

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute(['username' => $username, 'password' => $hash]);
}

// Authenticate User
function authenticateUser($username, $password) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) { // Verify hashed password
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['auth_token'] = bin2hex(random_bytes(32)); // Generate secure session token
        return true;
    }

    return false;
}

// Check Authorization by Role
function checkAuthorization($userId, $requiredRole) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT role FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch();

    return $user && $user['role'] === $requiredRole;
}

// Secure Page Access Example
function securePageAccess($requiredRole) {
    if (!isset($_SESSION['user_id']) || !checkAuthorization($_SESSION['user_id'], $requiredRole)) {
        header("Location: /login.php"); // Redirect to login if unauthorized
        exit;
    }
}

// Log User Out
function logout() {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session to log out
}

// Usage Examples
registerUser("john_doe", "SecurePassword123!"); // Register a new user
if (authenticateUser("john_doe", "SecurePassword123!")) {
    echo "User authenticated successfully!";
} else {
    echo "Authentication failed.";
}

// Securely Access an Admin-Only Page
securePageAccess("admin"); // Example to restrict page access to 'admin' role

// Logout User
logout();

?>