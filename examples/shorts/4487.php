<?php

// Example PHP code demonstrating XSS prevention with htmlspecialchars

// Simulated user input (replace with real input from form or database)
$user_input = "<script>alert('XSS attack!');</script>";

// Encode user input using htmlspecialchars
$safe_output = htmlspecialchars($user_input, ENT_QUOTES, 'UTF-8');

// Output sanitized input
echo "<p>User input after sanitization: $safe_output</p>";

?>