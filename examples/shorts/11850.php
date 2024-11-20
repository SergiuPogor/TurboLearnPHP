<?php
// Comparing phpinfo vs ini_get for accessing PHP configuration

// Example 1: Using phpinfo (Full configuration dump - useful but risky)
function dumpFullConfigToFile(string $filePath): void
{
    ob_start();
    phpinfo(); // Dumps the complete PHP configuration
    $phpInfo = ob_get_clean();
    file_put_contents($filePath, $phpInfo);
}

// Example 2: Using ini_get (Specific, secure access to settings)
function getCriticalConfigs(): array
{
    return [
        'memory_limit' => ini_get('memory_limit'),
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'display_errors' => ini_get('display_errors'),
        'log_errors' => ini_get('log_errors'),
    ];
}

// Example 3: Combining ini_get with custom configuration checks
function validateConfiguration(array $requiredSettings): bool
{
    foreach ($requiredSettings as $setting => $expectedValue) {
        if (ini_get($setting) != $expectedValue) {
            return false; // Configuration mismatch
        }
    }
    return true;
}

// Usage
dumpFullConfigToFile('/tmp/test/full_phpinfo.html'); // Save phpinfo to a file

$settings = getCriticalConfigs(); // Fetch specific settings

// Validate critical configurations
$required = [
    'memory_limit' => '128M',
    'log_errors' => '1'
];
$isValid = validateConfiguration($required);

// Save debug data
file_put_contents('/tmp/test/config_check.log', json_encode([
    'settings' => $settings,
    'isValid' => $isValid
]));
?>