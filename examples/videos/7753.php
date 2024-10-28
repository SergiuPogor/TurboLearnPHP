<?php
// Example of handling json_encode() issues in PHP

$data = [
    'name' => 'John Doe',
    'age' => 30,
    'skills' => ['PHP', 'JavaScript', 'Python'],
    'bio' => "I'm a developer with a knack for coding!",
    // Uncomment below line to simulate a circular reference issue
    // 'self' => &$data
];

// A non-UTF-8 character example
$data['description'] = "This is a test string with an invalid character: \xB0";

// Attempt to encode the data to JSON
$jsonData = json_encode($data);

// Check for errors
if ($jsonData === false) {
    // Output the error if json_encode() fails
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo 'No errors';
            break;
        case JSON_ERROR_DEPTH:
            echo 'Maximum stack depth exceeded';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            echo 'Underflow or the modes mismatch';
            break;
        case JSON_ERROR_CTRL_CHAR:
            echo 'Unexpected control character found';
            break;
        case JSON_ERROR_SYNTAX:
            echo 'Syntax error, malformed JSON';
            break;
        case JSON_ERROR_UTF8:
            echo 'Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
        default:
            echo 'Unknown error';
            break;
    }
} else {
    // Output the encoded JSON data if successful
    echo $jsonData;
}

// Fixing the issue by ensuring UTF-8 encoding
$data['description'] = mb_convert_encoding($data['description'], 'UTF-8', 'UTF-8');

$jsonDataFixed = json_encode($data);
if ($jsonDataFixed !== false) {
    echo $jsonDataFixed;
} else {
    // Output error if fixing still fails
    echo 'Encoding failed again.';
}
?>