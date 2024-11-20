<?php
// Comparing array_key_exists vs isset with nullable values

$data = [
    "username" => "johndoe",
    "email" => null, // Nullable field
    "is_active" => true,
];

// Using isset (fails for null values)
if (isset($data["email"])) {
    $issetCheck = "Email key exists and is set.";
} else {
    $issetCheck = "Email key does not exist or is null.";
}

// Using array_key_exists (works even for null values)
if (array_key_exists("email", $data)) {
    $arrayKeyExistsCheck = "Email key exists, regardless of its value.";
} else {
    $arrayKeyExistsCheck = "Email key does not exist.";
}

// Practical use case: Validating mandatory keys in an input array
$requiredKeys = ["username", "email", "is_active"];
$missingKeys = array_filter($requiredKeys, fn($key) => !array_key_exists($key, $data));

// Results
echo $issetCheck . PHP_EOL;
echo $arrayKeyExistsCheck . PHP_EOL;

if (!empty($missingKeys)) {
    echo "Missing mandatory keys: " . implode(", ", $missingKeys) . PHP_EOL;
}

// Alternative: Combine isset and array_key_exists for full validation
$validatedKeys = array_filter($data, fn($value, $key) => isset($value) || array_key_exists($key, $data), ARRAY_FILTER_USE_BOTH);

echo "Validated keys: " . implode(", ", array_keys($validatedKeys)) . PHP_EOL;
?>