<?php
// Comparing file_put_contents vs fwrite for file writing in PHP

$filePath = '/tmp/test/output.txt';
$data = str_repeat("Sample data line\n", 10000); // Simulate large data

// Example 1: Using file_put_contents (Quick and simple for smaller data)
file_put_contents($filePath, $data);

// Example 2: Using fwrite (Efficient for larger data chunks)
function writeLargeData(string $filePath, string $data): void
{
    $handle = fopen($filePath, 'w'); // Open file for writing
    if ($handle) {
        foreach (str_split($data, 4096) as $chunk) { // Write in chunks
            fwrite($handle, $chunk);
        }
        fclose($handle); // Always close the file
    }
}

writeLargeData('/tmp/test/output_chunked.txt', $data);

// Example 3: Comparing execution time
function benchmarkWriting(callable $writeFunction, string $filePath, string $data): void
{
    $start = microtime(true);
    $writeFunction($filePath, $data);
    $duration = microtime(true) - $start;
    file_put_contents('/tmp/test/benchmark.log', "$filePath: $duration seconds\n", FILE_APPEND);
}

// Run benchmarks
benchmarkWriting('file_put_contents', '/tmp/test/benchmark_simple.txt', $data);
benchmarkWriting('writeLargeData', '/tmp/test/benchmark_chunked.txt', $data);
?>