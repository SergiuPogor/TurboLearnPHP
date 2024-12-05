<?php
// Example 1: Using base64_encode to encode binary data into a readable format
$data = "Hello, this is a secret message!";
$encoded_base64 = base64_encode($data);

// Example 2: Using bin2hex to convert binary data to hexadecimal
$encoded_hex = bin2hex($data);

// Example 3: Decoding the base64 encoded string back to the original data
$decoded_base64 = base64_decode($encoded_base64);

// Example 4: Converting the hexadecimal back to the original binary data
$decoded_hex = hex2bin($encoded_hex);
?>