<?php
// Example using eval (risky and should be avoided)
$userInput = 'echo "Hello, world!";';
eval($userInput); // Danger: Can execute any PHP code provided by user

// Example using include (safer approach)
$fileName = '/tmp/test/hello.php';
if (file_exists($fileName)) {
    include($fileName); // Includes the file and executes its PHP code
}

// Safer with file handling (without eval)
$fileContent = file_get_contents($fileName);
echo $fileContent; // Display content without executing PHP code
?>