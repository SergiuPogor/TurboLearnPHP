<?php

// Function to sanitize user input by removing unwanted characters
function sanitize_input(string $input): string {
    $search = ["<script>", "</script>", "SELECT", "INSERT", "DELETE"];
    $replace = ["", "", "", "", ""];
    return str_replace($search, $replace, $input);
}

$userInput = "<script>alert('Hacked!');</script> SELECT * FROM users;";
$sanitizedInput = sanitize_input($userInput);

echo "Sanitized Input: " . $sanitizedInput;

// Example using str_replace for dynamic content updates in a template
function replace_placeholders(string $template, array $replacements): string {
    return str_replace(array_keys($replacements), array_values($replacements), $template);
}

$template = "Hello {name}, welcome to {site}.";
$replacements = ["{name}" => "Alice", "{site}" => "Example.com"];

$finalOutput = replace_placeholders($template, $replacements);

echo "Final Output: " . $finalOutput;

// Advanced use case: replacing multiple substrings in a large text efficiently
class TextProcessor
{
    private array $search;
    private array $replace;

    public function __construct(array $search, array $replace)
    {
        $this->search = $search;
        $this->replace = $replace;
    }

    public function processText(string $text): string
    {
        return str_replace($this->search, $this->replace, $text);
    }
}

$search = ["confidential", "urgent"];
$replace = ["private", "important"];
$processor = new TextProcessor($search, $replace);

$text = "This is a confidential report. Handle it as urgent.";
$processedText = $processor->processText($text);

echo "Processed Text: " . $processedText;
?>