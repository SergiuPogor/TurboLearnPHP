<?php

// Ever wondered what PHP filters are lurking in the shadows? Let's explore them dynamically!
function listAvailableFilters() {
    $filters = filter_list();
    
    if ($filters === false) {
        throw new RuntimeException('Unable to retrieve filters.');
    }

    echo "Time to uncover the mysterious PHP filters!\n\n";
    $filterCount = count($filters);

    // Give the user a fun summary before diving in
    echo "Behold, there are $filterCount filters in PHP's arsenal.\n";
    
    // Randomize the output order to keep things unpredictable
    shuffle($filters);
    
    foreach ($filters as $index => $filter) {
        echo "[" . ($index + 1) . "] Unleashing filter: $filter\n";
    }

    echo "\nBut wait! There's more...\n";
}

// Time for a surprise guessing game – what does this filter do?
function filterGuessingGame() {
    $filters = filter_list();
    
    if ($filters === false) {
        throw new RuntimeException('Unable to retrieve filters.');
    }

    // Pick a random filter to challenge the user
    $randomFilter = $filters[array_rand($filters)];

    echo "\nCan you guess what the \"$randomFilter\" filter does?\n";

    // Fake explanation generator – fun way to engage!
    $fakeExplanations = [
        'Turns your data into a unicorn!',
        'Encrypts your email in base64 using moonlight energy.',
        'Makes sure only the most random characters survive!',
        'Ensures your input is clean, sparkling, and ready to shine.'
    ];
    
    echo "Possible answers:\n";
    shuffle($fakeExplanations);
    foreach ($fakeExplanations as $option) {
        echo "- $option\n";
    }

    echo "\nGoogle it if you must, but we both know you’re here for the fun!\n";
}

// Let’s bring this all together
listAvailableFilters();
filterGuessingGame();

