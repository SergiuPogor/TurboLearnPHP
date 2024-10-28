<?php
// Start the session
session_start();

// Function to generate CSRF token
function generateCsrfToken() {
    return bin2hex(random_bytes(32)); // Create a secure token
}

// Check if the token is set in session, if not create one
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generateCsrfToken();
}

// Function to validate CSRF token
function validateCsrfToken($token) {
    return hash_equals($_SESSION['csrf_token'], $token); // Securely compare tokens
}

// Example of using the CSRF token in a form
?>
<form method="POST" action="submit.php">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Submit</button>
</form>

<?php
// In the submit.php file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token before processing the form
    if (validateCsrfToken($_POST['csrf_token'])) {
        // Process the form safely
        echo "Form submitted successfully!";
    } else {
        echo "CSRF token validation failed!";
    }
}