<?php
session_start();

// Generate a unique token for the form
function generateToken() {
    return bin2hex(random_bytes(32));
}

// Store the token in session
$_SESSION['form_token'] = generateToken();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the token from POST data
    $submittedToken = $_POST['form_token'] ?? '';
    
    // Validate the token
    if (!isset($_SESSION['form_token']) || $submittedToken !== $_SESSION['form_token']) {
        die('Invalid form submission');
    }
    
    // Invalidate the token
    unset($_SESSION['form_token']);
    
    // Process form data
    echo "Form submitted successfully!";
}

?>
<!-- Form HTML -->
<form method="POST" action="">
    <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">
    <input type="text" name="name" placeholder="Your name">
    <button type="submit">Submit</button>
</form>