<?php
// Using htmlspecialchars() to prevent XSS attacks in PHP

// Example user input - this could be malicious
$userInput = "<script>alert('XSS Attack!');</script>";

// Safely encode user input for HTML display
$safeOutput = htmlspecialchars($userInput, ENT_QUOTES | ENT_HTML5, 'UTF-8');

// Alternative approach for secure display: htmlspecialchars with custom encoding flags
$safeOutputAlt = htmlspecialchars($userInput, ENT_NOQUOTES, 'UTF-8');

echo "<div>User Input:</div>";
echo "<div>$safeOutput</div>"; // Safely displayed with htmlspecialchars

// Another real-world example in a dynamic page

// Imagine a comment posted by a user
$comments = [
    ['user' => 'Alice', 'comment' => "<b>Nice article!</b>"],
    ['user' => 'Bob', 'comment' => "<script>alert('Hacked!');</script>"]
];

// Safe output for each comment
foreach ($comments as $entry) {
    $user = htmlspecialchars($entry['user'], ENT_QUOTES, 'UTF-8');
    $comment = htmlspecialchars($entry['comment'], ENT_QUOTES, 'UTF-8');
    echo "<p><strong>$user:</strong> $comment</p>";
}

// Output is safe, displaying HTML entities instead of interpreting scripts
?>