<?php

// Example code demonstrating array_map vs foreach and array_key_exists optimization
$data = [];

// Generate random data
for ($i = 0; $i < 1000; $i++) {
    $data['key_' . $i] = 'value_' . $i;
}

// Using array_map for transformation
$transformed = array_map(function ($value) {
    return strtoupper($value);
}, $data);

// Using array_filter for filtering
$filtered = array_filter($data, function ($key) {
    return strpos($key, 'key_') === 0;
}, ARRAY_FILTER_USE_KEY);

// Using array_key_exists for validation
if (array_key_exists('key_500', $data)) {
    echo 'Key exists!';
}

?>