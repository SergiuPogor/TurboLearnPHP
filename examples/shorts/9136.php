<?php

// Enable Xdebug profiler
ini_set('xdebug.profiler_enable', '1');
ini_set('xdebug.profiler_output_dir', '/tmp/test'); // Ensure this directory is writable

// Sample function that simulates slow operations
function calculatePrimes(int $limit): array
{
    $primes = [];
    for ($i = 2; $i <= $limit; $i++) {
        $isPrime = true;
        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            $primes[] = $i;
        }
    }
    return $primes;
}

// Profiling in action
$primes = calculatePrimes(5000);

// To read and visualize the profile output, use a tool like cachegrind
// Run in CLI: `qcachegrind /tmp/test/cachegrind.out.<PID>`
// OR run in GUI with: `kcachegrind` on Linux or install QCacheGrind on Windows/Mac

// Alternative: Custom memory profiling without Xdebug (Fallback if Xdebug unavailable)
$startTime = microtime(true);
$memoryBefore = memory_get_usage();

$primesFallback = calculatePrimes(5000);

$executionTime = microtime(true) - $startTime;
$memoryAfter = memory_get_usage();
$memoryUsed = $memoryAfter - $memoryBefore;

echo "Execution time: {$executionTime} sec\n";
echo "Memory used: {$memoryUsed} bytes\n";

// Custom logs for alternative profiling
$logData = [
    'time' => $executionTime,
    'memory' => $memoryUsed
];
file_put_contents('/tmp/test/profile_log.json', json_encode($logData, JSON_PRETTY_PRINT));
?>