<?php
// Define the folder where the files will be saved
$outputFolder = __DIR__ . '/functions_by_extension/';
if (!is_dir($outputFolder)) {
    mkdir($outputFolder, 0777, true);
}

// Get all installed extensions
$extensions = get_loaded_extensions();

// Iterate over each extension to get its functions
foreach ($extensions as $extension) {
    // Skip if the extension is 'Core' or 'standard' as they are built-in
    if (in_array($extension, ['Core', 'standard'])) {
        continue;
    }

    // Get functions for the current extension
    $functions = get_extension_funcs($extension);

    if ($functions === false) {
        echo "Could not retrieve functions for extension: $extension\n";
        continue;
    }

    // Define the file path
    $filePath = $outputFolder . $extension . '.txt';

    // Open the file for writing
    $file = fopen($filePath, 'w');
    if (!$file) {
        echo "Could not open file for writing: $filePath\n";
        continue;
    }

    // Write functions to the file
    foreach ($functions as $function) {
        fwrite($file, $function . PHP_EOL);
    }

    fclose($file);
    echo "Functions for extension $extension have been saved to $filePath\n";
}

echo "Process completed.";
?>
