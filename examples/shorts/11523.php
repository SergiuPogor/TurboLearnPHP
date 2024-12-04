<?php

// Example using preg_match to find the first match
$string = "The price is $100";
$pattern = '/\$(\d+)/';
if (preg_match($pattern, $string, $matches)) {
    echo "Price found: " . $matches[1]; // Output: 100
}

// Example using preg_match_all to find all matches
$string = "The price is $100 and the discount is $20";
$pattern = '/\$(\d+)/';
preg_match_all($pattern, $string, $matches);
print_r($matches[1]); // Output: [100, 20]

// More complex example with multiple occurrences and nested patterns
$string = "User: John, Age: 25, User: Mike, Age: 30";
$pattern = '/User: (\w+), Age: (\d+)/';
preg_match_all($pattern, $string, $matches);
print_r($matches); // Output: [['John', 'Mike'], ['25', '30']]

?>