<?php
/**
 * Find the next prime number greater than the given number using gmp_nextprime().
 *
 * @param string $number A GMP number in string format.
 * @return string The next prime number in GMP number format.
 */
function findNextPrime(string $number): string {
    // Convert the input to a GMP number
    $gmpNumber = gmp_init($number);

    // Find the next prime number greater than the given number
    $nextPrime = gmp_nextprime($gmpNumber);

    // Return the result as a string
    return gmp_strval($nextPrime);
}

// Example usage
$inputNumber = '29'; // Example input
$nextPrime = findNextPrime($inputNumber);
echo "The next prime number after $inputNumber is $nextPrime.";
?>