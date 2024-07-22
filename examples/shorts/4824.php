<?php

// Example PHP code to handle JSON with special characters

$data = [
    'message' => 'Hello, world! 🌍',
    'characters' => 'äöüß€',
    'quote' => 'To be or not to be, that is the question.'
];

// Encoding JSON with special characters
$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo "Encoded JSON:\n$jsonData\n\n";

// Decoding JSON back to PHP array
$decodedData = json_decode($jsonData, true);

echo "Decoded Data:\n";
print_r($decodedData);

// Adding humor: Debugging the process
echo "\nDebugging: Let's see if everything worked perfectly or if we summoned the JSON demons.\n";

// Real-world scenario: Handling user input
$userInput = [
    'name' => "O'Reilly",
    'comment' => "It's a wonderful day!"
];

// Encode user input
$userJson = json_encode($userInput, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
echo "User Input Encoded JSON:\n$userJson\n\n";

// Decode user input
$decodedUserInput = json_decode($userJson, true);
echo "Decoded User Input:\n";
print_r($decodedUserInput);

echo "\nFinal thoughts: JSON handling can be fun, but always keep an eye out for those sneaky special characters!";
?>