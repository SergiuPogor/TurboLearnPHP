<?php
/**
 * Updates values in a nested array while handling complex key overwrites.
 *
 * @param array $baseArray The base array to be updated.
 * @param array $updateArray The array containing updates.
 * @return array The updated array.
 */
function updateNestedArray(array $baseArray, array $updateArray): array {
    foreach ($updateArray as $key => $value) {
        if (is_array($value) && isset($baseArray[$key]) && is_array($baseArray[$key])) {
            $baseArray[$key] = updateNestedArray($baseArray[$key], $value);
        } else {
            $baseArray[$key] = $value;
        }
    }
    return $baseArray;
}

// Example usage
$baseArray = [
    'user' => [
        'name' => 'Alice',
        'address' => [
            'city' => 'Wonderland',
            'zip' => '12345'
        ]
    ]
];

$updateArray = [
    'user' => [
        'address' => [
            'city' => 'New Wonderland'
        ]
    ]
];

$updatedArray = updateNestedArray($baseArray, $updateArray);
print_r($updatedArray);

/*
Output:
Array
(
    [user] => Array
        (
            [name] => Alice
            [address] => Array
                (
                    [city] => New Wonderland
                    [zip] => 12345
                )
        )
)
*/
?>