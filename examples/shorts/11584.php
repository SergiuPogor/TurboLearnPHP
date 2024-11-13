<?php

// Comparing array_map vs array_filter in real-world scenarios

// Use-case 1: Transforming an array using array_map
$products = [
    ['name' => 'Laptop', 'price' => 1200],
    ['name' => 'Smartphone', 'price' => 800],
    ['name' => 'Tablet', 'price' => 600]
];

// Applying a discount to all products
$discountedPrices = array_map(fn($product) => [
    'name' => $product['name'],
    'price' => $product['price'] * 0.9
], $products);

print_r($discountedPrices);

// Use-case 2: Filtering an array using array_filter
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Keeping only even numbers
$evenNumbers = array_filter($numbers, fn($num) => $num % 2 === 0);
print_r($evenNumbers);

// Advanced: Filtering and transforming data using both functions
$users = [
    ['id' => 1, 'active' => true, 'name' => 'Alice'],
    ['id' => 2, 'active' => false, 'name' => 'Bob'],
    ['id' => 3, 'active' => true, 'name' => 'Charlie'],
    ['id' => 4, 'active' => false, 'name' => 'David']
];

// Step 1: Filter only active users
$activeUsers = array_filter($users, fn($user) => $user['active']);

// Step 2: Extract names using array_map
$userNames = array_map(fn($user) => $user['name'], $activeUsers);
print_r($userNames);

// Combining both for a pipeline-like transformation
$emails = [
    "john.doe@example.com",
    "jane_smith@domain.com",
    "admin@website.org"
];

// Extract domain names and filter unique ones
$domains = array_unique(array_map(fn($email) => explode('@', $email)[1], $emails));
print_r($domains);

// Practical example: Reading a large CSV file and filtering valid rows
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $validRows = array_filter($lines, fn($line) => str_contains($line, ','));
    $parsedRows = array_map(fn($line) => explode(',', $line), $validRows);
    print_r($parsedRows);
}

// Reading compressed data using array functions
function extractFromZip(string $zipPath): void {
    $zip = new ZipArchive();
    if ($zip->open($zipPath) === true) {
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $content = $zip->getFromIndex($i);
            $lines = explode("\n", $content);
            $filteredLines = array_filter($lines, fn($line) => !empty($line));
            $parsedData = array_map(fn($line) => strtoupper($line), $filteredLines);
            print_r($parsedData);
        }
        $zip->close();
    }
}

extractFromZip('/tmp/test/input.zip');

?>