<?php
// Function to validate and sanitize an email address using filter_var
function validateAndSanitizeEmail(string $email): ?string {
    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        throw new InvalidArgumentException("Invalid email address.");
    }
    
    // Sanitize the email address to remove invalid characters
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}

// Example usage
try {
    $email = "user@example.com";
    $sanitizedEmail = validateAndSanitizeEmail($email);
    echo "Sanitized Email: " . $sanitizedEmail;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>