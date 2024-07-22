<?php
// Example PHP code demonstrating the use of array_replace_recursive

$array1 = [
    'user' => [
        'name' => 'John Doe',
        'details' => [
            'email' => 'john.doe@example.com',
            'age' => 30
        ],
        'roles' => ['admin']
    ],
    'settings' => [
        'theme' => 'light',
        'notifications' => ['email' => true]
    ]
];

$array2 = [
    'user' => [
        'name' => 'Jane Doe',
        'details' => [
            'email' => 'jane.doe@example.com'
        ],
        'roles' => ['editor']
    ],
    'settings' => [
        'theme' => 'dark',
        'notifications' => ['sms' => true]
    ]
];

$result = array_replace_recursive($array1, $array2);

print_r($result);

/*
Output:
Array
(
    [user] => Array
        (
            [name] => Jane Doe
            [details] => Array
                (
                    [email] => jane.doe@example.com
                    [age] => 30
                )
            [roles] => Array
                (
                    [0] => editor
                )
        )
    [settings] => Array
        (
            [theme] => dark
            [notifications] => Array
                (
                    [email] => true
                    [sms] => true
                )
        )
)
*/
?>