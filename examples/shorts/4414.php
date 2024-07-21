<?php

// Example: Exception Handling in PHP

class CustomException extends Exception {}

function validateAge($age) {
    if ($age < 18) {
        throw new CustomException("Age must be 18 or older.");
    }
    return "Age is valid.";
}

try {
    echo validateAge(15);
} catch (CustomException $e) {
    echo "Caught exception: " . $e->getMessage();
} finally {
    echo "\n";
}

?>