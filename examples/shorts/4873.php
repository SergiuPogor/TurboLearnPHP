<?php
// Example PHP code demonstrating the use of array_walk_recursive

$data = [
    "user" => [
        "name" => "John Doe",
        "email" => "john.doe@example.com",
        "roles" => ["admin", "editor"],
    ],
    "settings" => [
        "theme" => "dark",
        "notifications" => [
            "email" => true,
            "sms" => false,
        ],
    ],
];

function transformData(&$item, $key)
{
    if (is_string($item)) {
        $item = strtoupper($item);
    }
}

array_walk_recursive($data, 'transformData');

print_r($data);

/*
Output:
Array
(
    [user] => Array
        (
            [name] => JOHN DOE
            [email] => JOHN.DOE@EXAMPLE.COM
            [roles] => Array
                (
                    [0] => ADMIN
                    [1] => EDITOR
                )
        )
    [settings] => Array
        (
            [theme] => DARK
            [notifications] => Array
                (
                    [email] => 1
                    [sms] => 
                )
        )
)
*/
?>