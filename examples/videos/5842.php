<?php
// Sample array of strings to validate
$testStrings = [
    'a1b2c3', // valid hexadecimal
    'GHIJKL', // invalid hexadecimal
    '123456', // valid hexadecimal
    'abcDEF123', // valid hexadecimal
    'xyz', // invalid hexadecimal
    'FFAA00' // valid hexadecimal
];

// Function to validate hex strings using ctype_xdigit
function validateHexStrings($strings) {
    $validHex = [];
    $invalidHex = [];

    foreach ($strings as $string) {
        if (ctype_xdigit($string)) {
            $validHex[] = $string;
        } else {
            $invalidHex[] = $string;
        }
    }

    return [
        'valid' => $validHex,
        'invalid' => $invalidHex
    ];
}

// Validate the test strings
$result = validateHexStrings($testStrings);

// Output the results
echo "Valid Hexadecimal Strings:\n";
print_r($result['valid']);

echo "Invalid Hexadecimal Strings:\n";
print_r($result['invalid']);
?>