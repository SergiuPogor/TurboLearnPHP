<?php
// Start a session
session_start();

// Function to generate CSRF token
function generateCsrfToken() {
    // Check if the token already exists
    if (empty($_SESSION['csrf_token'])) {
        // Generate a new token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Call the function to get the CSRF token
$csrfToken = generateCsrfToken();

// In your form, include the token as a hidden field
echo '<form method="POST" action="process.php">';
echo '<input type="hidden" name="csrf_token" value="' . $csrfToken . '">';
echo '<input type="text" name="data" required>';
echo '<input type="submit" value="Submit">';
echo '</form>';

// Validate CSRF token on form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if token is valid
    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Process the form data
        echo "Form submitted successfully!";
    } else {
        // Token is invalid
        die("CSRF token validation failed!");
    }
}