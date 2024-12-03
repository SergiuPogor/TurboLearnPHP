<?php

$string = "Hello, welcome to PHP!";

// Using str_contains to check if a substring exists
if (str_contains($string, 'welcome')) {
    echo "'welcome' found in string using str_contains\n";
}

// Using strpos to find the position of a substring
if (strpos($string, 'welcome') !== false) {
    echo "'welcome' found in string using strpos\n";
}

?>