<?php
/**
 * Generate a custom random integer within a specified range.
 *
 * @param int $min Minimum value (inclusive).
 * @param int $max Maximum value (inclusive).
 * @return int Random integer within the specified range.
 * @throws RangeException If $min is greater than $max.
 */
function generateCustomRandomInt(int $min, int $max): int {
    // Validate range
    if ($min > $max) {
        throw new RangeException('Minimum must be less than or equal to maximum.');
    }

    // Generate random integer
    return mt_rand($min, $max);
}

// Example usage
try {
    $randomNumber = generateCustomRandomInt(10, 50);
    echo "Custom Random Number: " . $randomNumber;
} catch (RangeException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>