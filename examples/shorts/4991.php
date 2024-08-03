<?php
/**
 * Generate a random integer using mt_rand().
 *
 * @param int $min Minimum value of the random number.
 * @param int $max Maximum value of the random number.
 * @return int Random integer between min and max.
 */
function generateRandomNumber(int $min, int $max): int {
    // Ensure the minimum value is less than the maximum value
    if ($min > $max) {
        throw new InvalidArgumentException('Min must be less than or equal to max.');
    }

    // Generate and return a random integer
    return mt_rand($min, $max);
}

// Example usage
try {
    $randomNumber = generateRandomNumber(1, 100);
    echo "Random Number: " . $randomNumber;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>