<?php

// Example string manipulation in PHP

$inputString = "Hello, PHP developers! Let's manipulate some strings.";

// 1. Using substr to cut the string
$subString = substr($inputString, 7, 3); // "PHP"

// 2. Using str_replace to replace text
$replacedString = str_replace("manipulate", "handle", $inputString);

// 3. Using strlen to get the length
$stringLength = strlen($inputString); // 43

// 4. Using explode to split the string into an array
$stringArray = explode(" ", $inputString); // Array of words

// 5. Avoiding regex for performance in simpler cases
$pattern = '/PHP/';
preg_match($pattern, $inputString, $matches); // Find PHP in string

// Output results for demonstration
echo "Substring: $subString\n";
echo "Replaced String: $replacedString\n";
echo "String Length: $stringLength\n";
print_r($stringArray);
echo "Regex Matches: " . implode(", ", $matches) . "\n";

?>