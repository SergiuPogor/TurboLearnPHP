<?php
// Function to validate form inputs with multiple rules
function validateFormInputs(array $inputs): array {
    $errors = [];

    // Rule: Check if 'email' is a valid email
    if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address.';
    }

    // Rule: Check if 'age' is a number and between 18 and 99
    if (!filter_var($inputs['age'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 18, 'max_range' => 99]])) {
        $errors[] = 'Age must be between 18 and 99.';
    }

    // Rule: Check if 'password' meets complexity requirements
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $inputs['password'])) {
        $errors[] = 'Password must be at least 8 characters long and include one uppercase letter and one number.';
    }

    // Return the array of errors (empty if no errors)
    return $errors;
}

// Example form inputs
$formInputs = [
    'email' => 'example@domain.com',
    'age' => 25,
    'password' => 'Password1'
];

// Validate form inputs
$errors = validateFormInputs($formInputs);

// Output errors or success message
if (empty($errors)) {
    echo "Form submitted successfully!";
} else {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}
?>