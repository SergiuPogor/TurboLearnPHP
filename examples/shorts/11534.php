<?php
// Example 1: Using curl_exec (flexible and powerful)
$url = "https://example.com/api";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer YOUR_TOKEN"
]);
$response = curl_exec($ch);
curl_close($ch);

echo $response;

// Example 2: Using file_get_contents (simpler, but limited)
$url = "https://example.com/api";
$options = [
    "http" => [
        "header" => "Authorization: Bearer YOUR_TOKEN"
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

echo $response;
?>