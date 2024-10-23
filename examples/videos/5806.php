<?php
// Function to safely handle input validation using filter_has_var
function handleInput() {
    // Check if the 'username' variable is set in the POST request
    if (filter_has_var(INPUT_POST, 'username')) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    } else {
        // Handle case where 'username' is not provided
        $username = 'Guest';
    }
    
    // Now safely use $username in the application
    echo "Welcome, " . $username . "!";
}

// Simulating a POST request for demonstration
$_POST['username'] = '<script>alert("Hello")</script>';
handleInput(); // This should sanitize the input
?>