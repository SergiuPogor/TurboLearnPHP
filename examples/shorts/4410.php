<?php

// Example: Using __callStatic in PHP
class Example {
    public static function __callStatic($name, $arguments) {
        echo "Calling static method '$name' ";
        echo "with arguments: " . implode(', ', $arguments);
    }
}

// Call undefined static method
Example::undefinedMethod(1, 2, 3);

?>