<?php
// Example 1: Simple output using echo
$name = "John";
$score = 95;

echo "Student: $name scored $score points.\n";

// Example 2: Formatted output using printf
printf("Student: %s scored %d points.\n", $name, $score);

// Example 3: Using printf for precision in financial calculations
$price = 1234.56789;
printf("The product price is: $%.2f\n", $price);

// Example 4: Dynamic table generation with printf
$students = [
    ["name" => "Alice", "score" => 88],
    ["name" => "Bob", "score" => 92],
    ["name" => "Charlie", "score" => 79],
];

echo "Student Report:\n";
echo str_repeat("-", 25) . "\n";
printf("| %-10s | %-5s |\n", "Name", "Score");
echo str_repeat("-", 25) . "\n";

foreach ($students as $student) {
    printf("| %-10s | %-5d |\n", $student["name"], $student["score"]);
}

echo str_repeat("-", 25) . "\n";

// Reminder: Use echo for quick, unformatted text and printf for precise, professional output.
?>