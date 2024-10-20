<?php

function validateEmail($email) {
    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    // Define the pattern for a simple email check
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    // Perform the regex check
    if (!preg_match($pattern, $email)) {
        return false;
    }

    // Return true if email passes both checks
    return true;
}

function main() {
    $emails = [
        'user@example.com',
        'invalid-email',
        'user.name@domain.com',
        'user@.com',
        'user@domain..com',
        'user@domain.com'
    ];

    foreach ($emails as $email) {
        if (!validateEmail($email)) {
            // If validation fails, get the error message
            $error = preg_last_error_msg();
            echo "Email: $email - Invalid! Error: $error\n";
        } else {
            echo "Email: $email - Valid!\n";
        }
    }
}

main();

?>