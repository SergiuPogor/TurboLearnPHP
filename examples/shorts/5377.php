<?php

// Example 1: Basic usage of putenv
putenv('APP_ENV=development');
echo "App Environment: " . getenv('APP_ENV') . "\n";

// Example 2: Setting a sensitive environment variable
putenv('DATABASE_PASSWORD=my_secure_password');
echo "Database Password Set\n";

// Example 3: Overwriting an existing environment variable
putenv('APP_ENV=production');
echo "App Environment Updated: " . getenv('APP_ENV') . "\n";

// Example 4: Checking if an environment variable is set before setting it
if (!getenv('SESSION_TIMEOUT')) {
    putenv('SESSION_TIMEOUT=3600');
}
echo "Session Timeout: " . getenv('SESSION_TIMEOUT') . "\n";

// Example 5: Using putenv with a fallback
function setEnvironmentVariable($key, $value) {
    if (getenv($key) === false) {
        putenv("$key=$value");
    }
}

setEnvironmentVariable('CACHE_ENABLED', 'true');
echo "Cache Enabled: " . getenv('CACHE_ENABLED') . "\n";