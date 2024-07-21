// Example of using SplFileObject in PHP

// Open a file for reading
$file = new SplFileObject('example.txt', 'r');

// Iterate over each line in the file
while (!$file->eof()) {
    $line = $file->fgets();
    // Process each line here
    echo $line;
}

// Close the file
$file = null; // Explicitly unset to release resources