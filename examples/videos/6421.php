<?php

// Sample multibyte string containing various characters
$multibyteString = "こんにちは、世界！ Let's learn PHP regex!";

// Define a regex pattern to match specific multibyte characters
$pattern = "([こんにちは世界]+)";

// Set the internal encoding to handle multibyte characters correctly
mb_internal_encoding("UTF-8");
mb_regex_set_options('s');

// Start the regex search using mb_ereg_search
mb_ereg_search_init($multibyteString, $pattern);
$matches = mb_ereg_search();

// Check if any matches were found
if ($matches) {
    echo "Matched part: " . $matches[0] . "\n";
} else {
    echo "No matches found.\n";
}

// Example function to search and return all matches
function findAllMultibyteMatches($string, $pattern) {
    mb_ereg_search_init($string, $pattern);
    $allMatches = [];
    
    while ($match = mb_ereg_search()) {
        if ($match) {
            $allMatches[] = $match[0]; // Store each match
        }
    }

    return $allMatches;
}

// Use the function to find matches in the sample string
$matchesArray = findAllMultibyteMatches($multibyteString, $pattern);
if (!empty($matchesArray)) {
    echo "Extracted Matches: \n";
    print_r($matchesArray);
} else {
    echo "No matches found in function.\n";
}

// Advanced usage: Using different patterns
$patternTwo = "([A-Za-z]+)"; // Pattern to match English words
mb_ereg_search_init($multibyteString, $patternTwo);
$matchesEnglish = mb_ereg_search();
if ($matchesEnglish) {
    echo "Matched English part: " . $matchesEnglish[0] . "\n";
} else {
    echo "No English matches found.\n";
}

?>