<?php
// Function to validate input using ctype_graph()

$inputs = [
    'validString' => 'Hello_World!',
    'invalidString' => "Hello World\n",
    'punctuated' => 'PHP is #1!',
    'spacesAndTabs' => "Tab\tSpace Space",
];

// Validation using ctype_graph
foreach ($inputs as $key => $value) {
    if (ctype_graph($value)) {
        echo "Input '{$key}' contains only printable, non-space characters.\n";
    } else {
        echo "Input '{$key}' contains spaces or non-printable characters.\n";
    }
}

// Case 1: Handling form input validation
function isValidInput($input)
{
    return ctype_graph($input); // Use ctype_graph to filter unwanted spaces/non-printables
}

// Simulating a form field submission
$formData = [
    'username' => 'User123!',
    'comment' => 'Great Job!'
];

if (isValidInput($formData['username'])) {
    echo "Username is valid for registration.\n";
} else {
    echo "Username contains invalid characters.\n";
}

// Case 2: Validating file names from a zip archive
$zip = new ZipArchive();
if ($zip->open('/tmp/test/input.zip') === true) {
    for ($i = 0; $i < $zip->numFiles; $i++) {
        $fileName = $zip->getNameIndex($i);
        if (ctype_graph($fileName)) {
            echo "File '{$fileName}' has a valid name with printable characters.\n";
        } else {
            echo "File '{$fileName}' contains invalid characters (spaces, control chars).\n";
        }
    }
    $zip->close();
} else {
    echo "Failed to open the ZIP file.\n";
}

// Case 3: Sanitizing input from an uploaded text file
$uploadedContent = file_get_contents('/tmp/test/input.txt');
$sanitizedContent = '';
for ($i = 0; $i < strlen($uploadedContent); $i++) {
    if (ctype_graph($uploadedContent[$i])) {
        $sanitizedContent .= $uploadedContent[$i]; // Only keep printable, non-space characters
    }
}
file_put_contents('/tmp/test/sanitized_output.txt', $sanitizedContent);
echo "Sanitized content saved.\n";

// Case 4: Combining ctype_graph with ctype_space for more complex validation
function isGraphicalInput($input)
{
    $hasGraph = ctype_graph($input);
    $hasSpace = ctype_space($input);
    return $hasGraph || $hasSpace; // Allow either graphical or space characters
}

$testInput = "NoSpacesHere";
if (isGraphicalInput($testInput)) {
    echo "Input '{$testInput}' contains either printable or space characters.\n";
} else {
    echo "Input '{$testInput}' is invalid.\n";
}
?>