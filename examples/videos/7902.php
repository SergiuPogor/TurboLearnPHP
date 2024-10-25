<?php

/**
 * Demonstrates how to use PHP Generators to handle large datasets with minimal memory usage.
 * 
 * Generator function that reads large files line by line using `yield`.
 */
function readLargeFile(string $filePath): Generator
{
    if (!file_exists($filePath) || !is_readable($filePath)) {
        throw new InvalidArgumentException("File not found or not readable: $filePath");
    }

    // Open the file for reading
    $handle = fopen($filePath, 'rb');
    while (($line = fgets($handle)) !== false) {
        // Yield each line without loading entire file into memory
        yield trim($line);
    }
    fclose($handle);
}

// Example usage: Processing each line without high memory load
foreach (readLargeFile('/tmp/test/input.txt') as $line) {
    // Process each line (e.g., log or display)
    echo "Processing: $line" . PHP_EOL;
}

/**
 * Using Generators for large datasets, like database results
 * Generates one row at a time, avoiding memory issues in big data queries
 */
function fetchBigData(PDO $pdo): Generator
{
    $stmt = $pdo->prepare("SELECT * FROM large_table");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        yield $row; // Yielding row by row
    }
}

// Database connection example
try {
    $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'user', 'password');
    foreach (fetchBigData($pdo) as $row) {
        // Process each row individually
        echo "User ID: {$row['id']} - Name: {$row['name']}" . PHP_EOL;
    }
} catch (PDOException $e) {
    echo "DB Connection Error: " . $e->getMessage();
}

/**
 * Demonstrating generator-based pagination
 */
function paginateData(PDO $pdo, int $limit = 100): Generator
{
    $offset = 0;

    while (true) {
        $stmt = $pdo->prepare("SELECT * FROM large_table LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($rows)) {
            break; // No more results to fetch, exit
        }

        yield $rows; // Yield current batch of results
        $offset += $limit; // Move to next batch
    }
}

// Pagination example usage
foreach (paginateData($pdo) as $page) {
    foreach ($page as $row) {
        echo "Row ID: {$row['id']} - Content: {$row['content']}" . PHP_EOL;
    }
}