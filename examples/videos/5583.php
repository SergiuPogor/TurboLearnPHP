<?php

// Example input string with special characters
$inputString = "Hello, this is a test string with special characters: ©, ™, €.";

// Define character set and numeric entity mapping
$characterSet = 'UTF-8';
$numericEntities = [
    0xA9 => '&#169;', // ©
    0x2122 => '&#8482;', // ™
    0x20AC => '&#8364;'  // €
];

// Use mb_encode_numericentity to encode the special characters
$encodedString = mb_encode_numericentity(
    $inputString,
    $numericEntities,
    $characterSet
);

// Output the encoded string
echo "Encoded String: " . $encodedString . PHP_EOL;

// Function to decode the numeric entities back to characters
function decodeNumericEntities($str) {
    return html_entity_decode($str, ENT_QUOTES, 'UTF-8');
}

// Decoding the previously encoded string
$decodedString = decodeNumericEntities($encodedString);

// Output the decoded string
echo "Decoded String: " . $decodedString . PHP_EOL;

// Further use-case: Storing encoded string in a database
// Assuming $db is your database connection
//$stmt = $db->prepare("INSERT INTO messages (content) VALUES (:content)");
//$stmt->execute(['content' => $encodedString]);

?>