<?php
// Example of using stristr (case-insensitive)
$haystack = "Hello World";
$needle = "world";

$pos = stristr($haystack, $needle); // Returns the portion of the string starting from "world"
if ($pos) {
    echo "Found: " . $pos; // Output: Found: World
}

// Example of using strpos (case-sensitive)
$pos2 = strpos($haystack, $needle); // Returns FALSE, as it's case-sensitive
if ($pos2 !== false) {
    echo "Found at position: " . $pos2;
} else {
    echo "Not found!";
}

// Performance comparison in a loop
$data = ["hello", "world", "PHP", "is", "fun"];

foreach ($data as $item) {
    // Option 1: stristr
    if (stristr($item, "php")) {
        echo "Match found using stristr!";
    }

    // Option 2: strpos (case-sensitive)
    if (strpos($item, "php") !== false) {
        echo "Match found using strpos!";
    }
}
?>