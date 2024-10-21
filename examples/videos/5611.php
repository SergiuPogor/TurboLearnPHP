<?php
// Example 1: Simple case-insensitive search with mb_stripos()
// Suppose you're developing a multilingual search feature for a website.
// User input is case-insensitive and could include multibyte characters (like Chinese, Arabic, or Japanese).

// A string containing both uppercase and lowercase, plus multibyte characters
$input_str = "The quick brown Fox jumped over the lazy 犬猫";

// Perform a case-insensitive search for 'fox' (English) and '犬' (Japanese)
$position_fox = mb_stripos($input_str, "fox");  // Finds 'Fox' at position 16
$position_japanese = mb_stripos($input_str, "犬");  // Finds '犬' at position 38

echo "Position of 'fox': " . $position_fox . "\n";
echo "Position of '犬': " . $position_japanese . "\n";

// Example 2: Handling UTF-8 encoded strings in a search
// Let's say we are filtering product names that could contain international characters.
// Ensure the string encoding is correct for non-English languages.
$product_name = "ナルト と サスケ の 戦い"; // Japanese for "Naruto and Sasuke's battle"

// Searching for "サスケ" (Sasuke) case-insensitively
$position_sasuke = mb_stripos($product_name, "サスケ");
echo "Position of 'サスケ': " . $position_sasuke . "\n";

// Example 3: Enhancing the search with an offset
// You might want to skip the first part of the string and start searching from a specific position
$offset_search = mb_stripos($input_str, "the", 5);  // Starts searching from position 5
echo "Position of 'the' after offset: " . $offset_search . "\n";

// Example 4: Using mb_stripos with large data sets (performance consideration)
// When processing large blocks of text (e.g., product reviews or descriptions), 
// mb_stripos is an ideal choice to search through text efficiently without case sensitivity.

$large_text_block = file_get_contents('/tmp/test/input.txt');  // Load a large text file

// Searching for a keyword 'performance' in the large text block
$keyword = "performance";
$position_keyword = mb_stripos($large_text_block, $keyword);

if ($position_keyword !== false) {
    echo "Keyword 'performance' found at position: " . $position_keyword . "\n";
} else {
    echo "Keyword 'performance' not found.\n";
}

// Example 5: Multi-language user input processing
// You can use mb_stripos to build a robust input validation or filtering system.
// For example, detecting banned words in various languages across user-generated content.

$user_comment = "Este es un comentario no permitido, incluye la palabra censurada.";

// List of banned words in different languages (Spanish, English, Japanese)
$banned_words = ["no permitido", "banned", "禁止"];

// Check if the user comment contains any banned words
foreach ($banned_words as $banned_word) {
    if (mb_stripos($user_comment, $banned_word) !== false) {
        echo "Found banned word: " . $banned_word . "\n";
    }
}

// Example 6: Highlighting a keyword found in a string
// If you want to highlight or emphasize a keyword found in a large block of text
// using mb_stripos and replacing that portion with some HTML for front-end display.

$text = "This is an example text where we highlight a specific keyword.";
$keyword = "highlight";
$position = mb_stripos($text, $keyword);

if ($position !== false) {
    // Insert HTML <strong> tag around the keyword
    $highlighted_text = mb_substr($text, 0, $position) . "<strong>" . mb_substr($text, $position, mb_strlen($keyword)) . "</strong>" . 
                        mb_substr($text, $position + mb_strlen($keyword));
    echo $highlighted_text . "\n";
}

// Final Example: Handling edge cases
// If mb_stripos returns `false`, that means the substring was not found.
// It's crucial to always check this before assuming the position.

$no_result = mb_stripos($input_str, "nonexistent");
if ($no_result === false) {
    echo "The substring was not found.\n";
} else {
    echo "Found at position: " . $no_result . "\n";
}

?>