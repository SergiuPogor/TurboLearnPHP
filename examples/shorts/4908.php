<?php
// Example of using str_contains in a real app scenario

// Simulating user input
$userInput = "Hello, welcome to our amazing PHP tutorial!";

// Keywords to search for
$keywords = ["welcome", "goodbye", "PHP"];

// Function to check for keywords in the input
function containsKeywords(string $input, array $keywords): array {
    $foundKeywords = [];

    foreach ($keywords as $keyword) {
        if (str_contains($input, $keyword)) {
            $foundKeywords[] = $keyword;
        }
    }

    return $foundKeywords;
}

// Execute the function
$detectedKeywords = containsKeywords($userInput, $keywords);

// Output results
if (!empty($detectedKeywords)) {
    echo "Detected keywords: " . implode(", ", $detectedKeywords);
} else {
    echo "No keywords detected.";
}

// Example usage in a validation context
$email = "example@domain.com";

if (str_contains($email, "@")) {
    echo "\nValid email format.";
} else {
    echo "\nInvalid email format.";
}
?>