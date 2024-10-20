<?php

// Example 1: Basic usage of readline() to capture user input
function captureUserInput() {
    $name = readline("Enter your name: "); // Prompting user for input
    echo "Hello, $name! Welcome to the PHP lesson.\n"; // Greeting the user
}

// Example 2: Handling multiple inputs using readline()
function captureMultipleInputs() {
    $responses = [];
    $questions = [
        "What is your favorite programming language?",
        "What is your preferred development environment?",
        "What frameworks do you like to use?"
    ];

    foreach ($questions as $question) {
        $response = readline("$question "); // Prompting for each question
        $responses[] = $response; // Storing responses in an array
    }

    echo "Your responses:\n";
    print_r($responses); // Displaying all captured responses
}

// Example 3: Using readline() with validation
function captureValidatedInput() {
    do {
        $age = readline("Enter your age: "); // Prompt for age
        if (!is_numeric($age) || $age < 0) {
            echo "Please enter a valid age.\n"; // Validation error message
        }
    } while (!is_numeric($age) || $age < 0); // Loop until valid input is given

    echo "Your age is $age.\n"; // Displaying the valid input
}

// Running the examples
captureUserInput();
captureMultipleInputs();
captureValidatedInput();

?>