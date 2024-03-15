<?php

/**
 * Useful Links:
 * - GitHub Repository: https://github.com/SergiuPogor/TurboLearnPHP
 * - Related Article: https://medium.com/@256cub/php-currency-exchange-converter-6b35561ab055
 */

$baseAmount = 1; // The amount in base currency to convert
$baseCurrency = 'USD'; // The base currency code
$cacheFile = '/tmp/currency_rates_cache.json'; // Cache file to store the rates
$cacheLifetime = 12 * 60 * 60; // Cache lifetime in seconds (12 hours)

// Function to check if the cache file is still valid
function isCacheValid($file, $lifetime)
{
    return file_exists($file) && (filemtime($file) + $lifetime > time());
}

// Function to fetch rates from the API
function fetchRates($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// Check if cache is valid, if not fetch new data
if (!isCacheValid($cacheFile, $cacheLifetime)) {
    $response = fetchRates("https://api.exchangerate-api.com/v4/latest/{$baseCurrency}");
    if ($response !== false) {
        // Save the new rates in cache file
        file_put_contents($cacheFile, $response);
    }
} else {
    // Load the rates from the cache file
    $response = file_get_contents($cacheFile);
}

// Proceed only if we have a valid response
if ($response !== false) {
    $data = json_decode($response, true);
    if (isset($data['rates']) && count($data['rates']) > 0) {

        // Include some basic styling for better presentation
        print '<style>
                body { font-family: Arial, sans-serif; }
                .rate { margin-bottom: 10px; }
                .currency { font-weight: bold; color: #333; }
                .amount { color: #007BFF; }
              </style>';

        print '<div class="rates">';
        foreach ($data['rates'] as $currency => $rate) {
            $convertedAmount = $baseAmount * $rate;
            print '<div class="rate"><span class="currency">' . $baseCurrency . ' to ' . $currency . ':</span> <span class="amount">' . number_format($convertedAmount, 2) . '</span></div>';
        }
        print '</div>';

    } else {
        print '<p>Error fetching currency data. Please check the API key and the request URL.</p>';
    }
} else {
    print '<p>Error performing request. Check your network connection and the URL syntax.</p>';
}
