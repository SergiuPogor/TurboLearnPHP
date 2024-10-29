<?php
// Example of PHP dynamic typing and type hints

// Dynamically typed variables
$variable = "Hello, World!"; // This is a string
echo $variable . "\n"; // Outputs: Hello, World!

$variable = 42; // Now this is an integer
echo $variable . "\n"; // Outputs: 42

// Function with type hinting
function greet(string $name): string {
    return "Hello, " . $name . "!";
}

// Correct usage
echo greet("Alice") . "\n"; // Outputs: Hello, Alice!

// Uncommenting the line below will cause a TypeError
// echo greet(123); // This will throw an error

// Using strict types
declare(strict_types=1); // Enable strict type checking

function add(int $a, int $b): int {
    return $a + $b;
}

// Correct usage
echo add(10, 20) . "\n"; // Outputs: 30

// Uncommenting the line below will cause a TypeError
// echo add(10, "20"); // This will throw an error