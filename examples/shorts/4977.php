<?php
/**
 * Generate a random decimal number within a specified range.
 *
 * @param float $min Minimum value of the range.
 * @param float $max Maximum value of the range.
 * @param int $precision Number of decimal places.
 * @return float Random decimal number.
 */
function generateRandomDecimal(float $min, float $max, int $precision = 2): float {
    // Ensure min is less than max
    if ($min >= $max) {
        throw new InvalidArgumentException('Minimum must be less than maximum.');
    }

    // Generate a random integer and scale it to a decimal
    $scale = pow(10, $precision);
    return round(mt_rand($min * $scale, $max * $scale) / $scale, $precision);
}

// Example usage
try {
    $randomDecimal = generateRandomDecimal(1.5, 5.5, 3);
    echo "Generated Random Decimal: $randomDecimal";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>