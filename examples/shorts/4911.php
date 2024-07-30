<?php

// Function to check if a file path starts with a certain directory
function is_path_in_directory(string $filePath, string $directory): bool {
    return str_starts_with($filePath, $directory);
}

$filePath = "/var/www/html/index.php";
$directory = "/var/www/html";

if (is_path_in_directory($filePath, $directory)) {
    echo "The file is within the specified directory.";
} else {
    echo "The file is not within the specified directory.";
}

// Example demonstrating how to use str_starts_with for URL validation
function is_valid_url(string $url): bool {
    $validPrefix = "https://";
    return str_starts_with($url, $validPrefix);
}

$url = "https://example.com";

if (is_valid_url($url)) {
    echo "The URL is valid and secure.";
} else {
    echo "The URL is not valid or not secure.";
}

// Advanced use case: checking if user input starts with a certain command prefix
class CommandChecker
{
    private string $commandPrefix;

    public function __construct(string $commandPrefix)
    {
        $this->commandPrefix = $commandPrefix;
    }

    public function isCommand(string $input): bool
    {
        return str_starts_with($input, $this->commandPrefix);
    }
}

$commandChecker = new CommandChecker("/command ");
$input = "/command run diagnostics";

if ($commandChecker->isCommand($input)) {
    echo "This is a valid command.";
} else {
    echo "This is not a valid command.";
}
?>