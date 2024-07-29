<?php

// A common use case in a real-world app: checking if a user's input contains prohibited words
function contains_prohibited_words(string $input, array $prohibitedWords): bool {
    foreach ($prohibitedWords as $word) {
        if (str_contains($input, $word)) {
            return true;
        }
    }
    return false;
}

$input = "This is a test string with some prohibited content.";
$prohibitedWords = ["prohibited", "banned", "restricted"];

if (contains_prohibited_words($input, $prohibitedWords)) {
    echo "The input contains prohibited words.";
} else {
    echo "The input is clean.";
}

// Example demonstrating how to use str_contains in a more advanced scenario
class ContentFilter
{
    private array $prohibitedWords;

    public function __construct(array $prohibitedWords)
    {
        $this->prohibitedWords = $prohibitedWords;
    }

    public function filterContent(string $content): string
    {
        foreach ($this->prohibitedWords as $word) {
            if (str_contains($content, $word)) {
                return str_replace($word, '***', $content);
            }
        }
        return $content;
    }
}

$filter = new ContentFilter(["prohibited", "banned", "restricted"]);
$content = "This is a test string with some prohibited content.";

echo $filter->filterContent($content);

// Advanced use case: checking multiple substrings in a configuration file for potential security issues
function check_config_for_security_issues(string $configContent, array $dangerousPatterns): bool
{
    foreach ($dangerousPatterns as $pattern) {
        if (str_contains($configContent, $pattern)) {
            return true;
        }
    }
    return false;
}

$configContent = "DB_PASSWORD=secret123; API_KEY=abcd1234;";
$dangerousPatterns = ["DB_PASSWORD", "API_KEY"];

if (check_config_for_security_issues($configContent, $dangerousPatterns)) {
    echo "Security issues found in the configuration file.";
} else {
    echo "The configuration file is safe.";
}
?>