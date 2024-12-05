<?php
// Example 1: Using $_POST for raw data access
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Valid email: {$email}\n";
    } else {
        echo "Invalid email format.\n";
    }
}

// Example 2: Using filter_input for secure data access
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email) {
    echo "Valid email: {$email}\n";
} else {
    echo "Invalid or missing email.\n";
}

// Example 3: Advanced example with custom filter options
$options = [
    'options' => [
        'min_range' => 1,
        'max_range' => 100
    ]
];
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options);
if ($age) {
    echo "Valid age: {$age}\n";
} else {
    echo "Age must be a number between 1 and 100.\n";
}

// Example 4: Debugging unexpected $_POST manipulation
// Using filter_has_var to check input existence
if (filter_has_var(INPUT_POST, 'username')) {
    echo "Username is provided securely.\n";
} else {
    echo "Username not set or invalid input.\n";
}

// Best Practice: Prefer filter_input for security and validation over raw $_POST.
?>