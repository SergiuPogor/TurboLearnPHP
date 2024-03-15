<?php

/**
 * Useful Links:
 * - GitHub Repository: https://github.com/SergiuPogor/TurboLearnPHP
 * - YouTube Video: https://www.youtube.com/shorts/qbPP6xTN-Os
 */

$data = [
    'name' => 'Mike Smith',
    'contacts' => [
        'emails' => [
            'mk1@gmail.com',
            'mk2@gmail.com',
            'mk3@gmail.com',
        ],
        'phone' => '123-456-7890'
    ],
    'tags' => ['php', 'developer', 'backend'],
    'details' => [
        'projects' => [
            'project1' => 'Library Management System',
            'project2' => 'Online Action System'
        ]
    ]
];


array_walk_recursive($data, function (&$item, $key) {
    if (is_string($item)) {
        $item = strtoupper($item);
    }
});

var_dump($data);