<?php
// Example of using str_pad in a real app scenario

// Simulating dynamic data
$productNames = ["Apple", "Banana", "Cherry"];
$productPrices = [1.25, 0.75, 2.00];

// Function to format product details
function formatProductDetails(array $names, array $prices): string {
    $output = "Product    | Price\n";
    $output .= "-----------|--------\n";
    
    foreach ($names as $index => $name) {
        // Padding product name to 10 characters and price to 6 characters
        $paddedName = str_pad($name, 10, " ");
        $paddedPrice = str_pad(number_format($prices[$index], 2), 6, " ", STR_PAD_LEFT);
        $output .= "$paddedName | $paddedPrice\n";
    }
    
    return $output;
}

// Execute the function
$formattedDetails = formatProductDetails($productNames, $productPrices);

// Output results
echo $formattedDetails;
?>