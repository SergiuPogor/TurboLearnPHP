<?php

// Function to generate random user IDs using mt_rand()
function generateRandomUserIDs($numIDs) {
    $userIDs = [];

    for ($i = 0; $i < $numIDs; $i++) {
        // Create a random user ID between 1 and 10000
        $userIDs[] = mt_rand(1, 10000);
    }

    return $userIDs;
}

// Function to generate random product prices using mt_rand()
function generateRandomProductPrices($numPrices) {
    $prices = [];

    for ($i = 0; $i < $numPrices; $i++) {
        // Create a random price between 10 and 500 with two decimal points
        $prices[] = number_format(mt_rand(1000, 50000) / 100, 2);
    }

    return $prices;
}

// Example usage
$numIDs = 5; // Specify the number of user IDs to generate
$numPrices = 5; // Specify the number of prices to generate

$userIDs = generateRandomUserIDs($numIDs);
$productPrices = generateRandomProductPrices($numPrices);

// Display the results
echo "Generated User IDs: " . implode(", ", $userIDs) . "\n";
echo "Generated Product Prices: $" . implode(", $", $productPrices) . "\n";

// Function to generate a random hexadecimal color code
function generateRandomColor() {
    // Generate a random hex color code
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

// Generate multiple random colors
$colors = [];
for ($i = 0; $i < 5; $i++) {
    $colors[] = generateRandomColor();
}

// Display the generated colors
echo "Generated Random Colors: " . implode(", ", $colors) . "\n";

?>