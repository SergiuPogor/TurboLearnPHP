<?php
// Using strtoupper
$string = "élève";
echo strtoupper($string); // Output: ÉLÈVE (Incorrect for multilingual support)

// Using mb_strtoupper (better for multilingual support)
$mbString = "élève";
echo mb_strtoupper($mbString, 'UTF-8'); // Output: ÉLÈVE (Correct for multilingual characters)

// Example with another multilingual string
$multiString = "naïve";
echo mb_strtoupper($multiString, 'UTF-8'); // Output: NAÏVE (Correct handling)
?>