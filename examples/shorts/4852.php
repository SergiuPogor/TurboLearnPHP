<?php
// Example demonstrating the nuances of PHP's strtr function

// Function to demonstrate strtr with multi-character replacements
function replaceString($input) {
    // Replacement table with multi-character replacements
    $trans = [
        'abc' => '123',
        'def' => '456'
    ];

    // Using strtr with the replacement table
    return strtr($input, $trans);
}

// Examples
$input1 = 'abcdef';
$input2 = 'ghijklm';

// Output of function calls
echo replaceString($input1); // Output: 123456
echo "\n";
echo replaceString($input2); // Output: ghijklm

// Example with str_replace for complex replacements
function replaceStringWithReplace($input) {
    // Replacement table with multi-character replacements
    $search = ['abc', 'def'];
    $replace = ['123', '456'];

    // Using str_replace for more control
    return str_replace($search, $replace, $input);
}

// Output of function calls with str_replace
echo replaceStringWithReplace($input1); // Output: 123456
echo "\n";
echo replaceStringWithReplace($input2); // Output: ghijklm
?>