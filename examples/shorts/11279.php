<?php

// Using json_encode() for JSON serialization
$data1 = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
$json = json_encode($data1);
echo $json; // Output: {"name":"John","age":30,"city":"New York"}

// Using serialize() for PHP serialization
$data2 = [
    "name" => "Jane",
    "age" => 28,
    "city" => "Los Angeles"
];
$serialized = serialize($data2);
echo $serialized; // Output: a:3:{s:4:"name";s:4:"Jane";s:3:"age";i:28;s:4:"city";s:11:"Los Angeles";}

// Saving and restoring data using serialize()
file_put_contents('/tmp/test/serialized_data.txt', $serialized);
$loadedData = file_get_contents('/tmp/test/serialized_data.txt');
$restoredData = unserialize($loadedData);
print_r($restoredData); // Output: Array ( [name] => Jane [age] => 28 [city] => Los Angeles )

// Comparing json_encode() vs serialize() performance
$start = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    json_encode($data1);
}
echo "json_encode: " . (microtime(true) - $start) . " seconds\n";

$start = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    serialize($data2);
}
echo "serialize: " . (microtime(true) - $start) . " seconds\n";

?>