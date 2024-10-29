<?php
session_start();

// Function to generate CSRF token
function generateCsrfToken() {
    return bin2hex(random_bytes(32)); // Generate a secure random token
}

// Store CSRF token in session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generateCsrfToken();
}

// Function to verify CSRF token
function verifyCsrfToken($token) {
    return hash_equals($_SESSION['csrf_token'], $token);
}

// Example form rendering
?>
<form method="POST" action="submit.php">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="text" name="data" required>
    <button type="submit">Submit</button>
</form>

<?php
// In submit.php, verify the CSRF token before processing the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        die("CSRF token validation failed!");
    }
    // Process form data
    echo "Form submitted successfully!";
}