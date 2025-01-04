<?php

// Function to validate input
function validateInput($input) {
    // Check if the input is all uppercase
    if (ctype_upper($input)) {
        return "Valid input: All characters are uppercase.";
    } else {
        return "Invalid input: Not all characters are uppercase.";
    }
}

// Example inputs to test
$inputs = [
    "HELLO WORLD",
    "Hello World",
    "PHP IS GREAT",
    "123456",
    "PHP"
];

// Step through each input and validate
foreach ($inputs as $input) {
    $result = validateInput($input);
    echo "Input: $input -> $result\n";
}

// Handling user input from a form (for example)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInput = trim($_POST['user_input']);
    $validationResult = validateInput($userInput);
    echo $validationResult;
}

// Additional validation with error handling
try {
    $inputToCheck = "CHECK ME!";
    if ($inputToCheck === '') {
        throw new Exception("Input cannot be empty.");
    }
    echo validateInput($inputToCheck);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>