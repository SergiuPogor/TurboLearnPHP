<?php
// Example of array_key_exists vs in_array

$data = [
    "user_id" => 123,
    "email" => null, // Note: null value
    "role" => "admin",
];

// Check if a key exists in the array
if (array_key_exists("email", $data)) {
    $keyCheck = "Key 'email' exists in the array, even though its value is null.";
}

// Check if a value exists in the array
if (in_array("admin", $data, true)) {
    $valueCheck = "Value 'admin' exists in the array.";
}

// Using isset vs array_key_exists for null values
if (isset($data["email"])) {
    $issetResult = "isset() falsely assumes 'email' key does not exist.";
} else {
    $issetResult = "array_key_exists correctly identifies the 'email' key.";
}

// A real-world use case: Validating required keys
$requiredKeys = ["user_id", "email"];
$missingKeys = [];
foreach ($requiredKeys as $key) {
    if (!array_key_exists($key, $data)) {
        $missingKeys[] = $key;
    }
}

// Output results
echo $keyCheck . PHP_EOL;
echo $valueCheck . PHP_EOL;
echo $issetResult . PHP_EOL;

if (!empty($missingKeys)) {
    echo "Missing keys: " . implode(", ", $missingKeys) . PHP_EOL;
}
?>