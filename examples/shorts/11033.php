<?php

// Using str_replace for a simple replacement
$input = "Hello World!";
$output = str_replace("World", "PHP", $input);
echo $output; // Output: Hello PHP!

// Using preg_replace for pattern-based replacement
$input = "My number is 123-456-7890";
$pattern = "/\d{3}-\d{3}-\d{4}/";
$output = preg_replace($pattern, "XXX-XXX-XXXX", $input);
echo $output; // Output: My number is XXX-XXX-XXXX

// Example where preg_replace is necessary for more complex replacements
$input = "My email is test@example.com";
$pattern = "/(\w+)@(\w+)\.(com|net)/";
$output = preg_replace($pattern, "$1@$2.org", $input);
echo $output; // Output: My email is test@example.org

?>