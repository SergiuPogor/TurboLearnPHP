<?php

// Example 1: Basic getopt() usage
$options = getopt("f::o:", ["file::", "output:"]);
print_r($options);

// Example 2: Handling required and optional options
$options = getopt("f:o:", ["file:", "output::"]);
if (!isset($options['f'])) {
    die("Error: 'file' option is required.\n");
}
echo "File: " . $options['f'] . "\n";
if (isset($options['o'])) {
    echo "Output: " . $options['o'] . "\n";
}

// Example 3: Providing default values
$options = getopt("f::o:", ["file::", "output::"]);
$file = $options['f'] ?? 'default.txt';
$output = $options['o'] ?? 'default_output.txt';
echo "File: $file\n";
echo "Output: $output\n";

// Example 4: Parsing long and short options together
$options = getopt("a:b:c:", ["alpha:", "beta:", "gamma::"]);
print_r($options);

// Example 5: Validating options
$options = getopt("a:b:", ["alpha:", "beta:"]);
if (!isset($options['a'])) {
    echo "Warning: 'alpha' option is missing.\n";
}
if (isset($options['beta']) && $options['beta'] === 'invalid') {
    echo "Warning: 'beta' option value is invalid.\n";
}