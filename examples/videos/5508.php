<?php

// Dynamic hash generation using random algorithms with fallback for mhash absence.

function getHashAlgorithmNameOrFallback($algorithmId)
{
    if (extension_loaded('mhash')) {
        return mhash_get_hash_name($algorithmId);
    } else {
        $legacyFallbacks = [
            MHASH_MD5 => 'md5',
            MHASH_SHA256 => 'sha256',
            MHASH_SHA1 => 'sha1',
        ];
        return $legacyFallbacks[$algorithmId] ?? 'md5';
    }
}

function pickRandomAlgorithm()
{
    $algorithms = [
        MHASH_MD5,
        MHASH_SHA256,
        MHASH_SHA1,
        MHASH_RIPEMD160,
        MHASH_TIGER,
        MHASH_CRC32,
    ];
    return $algorithms[array_rand($algorithms)];
}

$chosenAlgorithm = pickRandomAlgorithm();
$hashName = getHashAlgorithmNameOrFallback($chosenAlgorithm);

echo "You've summoned the legendary Hash Algorithm: $hashName!" . PHP_EOL;

$dataArray = [
    'Unicorn tears',
    'PHP is love, PHP is life',
    'Why did the hash cross the road?',
    'Hashing ain’t easy, but somebody’s gotta do it',
    'Just a random string for randomness',
];

$dataToHash = $dataArray[array_rand($dataArray)];

echo "Selected data for hashing: '$dataToHash'" . PHP_EOL;

if (extension_loaded('mhash')) {
    $hash = mhash($chosenAlgorithm, $dataToHash);
} else {
    $hash = hash($hashName, $dataToHash);
}

echo "And the mighty hash value is: " . bin2hex($hash) . PHP_EOL;

$comparison = bin2hex($hash) === hash('md5', 'I love PHP') ? 'MATCHED!' : 'TOTALLY DIFFERENT!';

echo "Does our hash match the sacred 'I love PHP' hash? $comparison" . PHP_EOL;

