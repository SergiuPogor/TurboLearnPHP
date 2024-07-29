<?php
/**
 * Generate a random integer using the Mersenne Twister algorithm.
 *
 * @param int $min Minimum value of the range.
 * @param int $max Maximum value of the range.
 * @return int Random integer within the specified range.
 * @throws RangeException If min is greater than max.
 */
function generateFastRandomInt(int $min, int $max): int {
    // Validate the range
    if ($min > $max) {
        throw new RangeException('Minimum must be less than or equal to maximum.');
    }

    // Generate a random integer using mt_rand
    return mt_rand($min, $max);
}

// Example usage
try {
    $randomInt = generateFastRandomInt(1, 100); // Random integer between 1 and 100
    echo "Random Integer: $randomInt";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>