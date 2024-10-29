<?php
// Validating user input in PHP to enhance security

// Sample user input from a form
$userInput = $_POST['username'] ?? '';

// Function to validate user input
function validateInput($input) {
    // Trim whitespace from input
    $input = trim($input);
    
    // Remove special characters
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    
    // Check for a minimum length
    if (strlen($input) < 3) {
        throw new Exception("Input must be at least 3 characters long.");
    }
    
    return $input;
}

try {
    // Validate the user input
    $validatedInput = validateInput($userInput);
    echo "Validated Input: " . $validatedInput;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Example of a simple form with validation
?>

<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <input type="submit" value="Submit">
</form>