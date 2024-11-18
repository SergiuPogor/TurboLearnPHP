<?php

// Example of using filter_var and preg_match for input validation

// Using filter_var for email validation
$email = "example@domain.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email address.";
} else {
    echo "Invalid email address.";
}

// Using preg_match for custom validation (phone number example)
$phone = "+123-456-7890";
$pattern = "/^\+?[0-9]{1,3}-[0-9]{3}-[0-9]{4}$/";
if (preg_match($pattern, $phone)) {
    echo "Valid phone number.";
} else {
    echo "Invalid phone number.";
}

// Using preg_match to validate a URL
$url = "https://www.example.com";
$pattern = "/^(https?:\/\/)?([a-z0-9-]+\.)+[a-z0-9]{2,6}(\/[a-z0-9\-]*)*\/?$/i";
if (preg_match($pattern, $url)) {
    echo "Valid URL.";
} else {
    echo "Invalid URL.";
}

?>