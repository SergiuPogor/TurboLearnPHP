<?php
// This code demonstrates how to contribute to the PHP documentation by submitting changes via GitHub.

function createPullRequest($repo, $branch, $message) {
    $url = "https://api.github.com/repos/$repo/pulls";
    $data = [
        'title' => 'Update PHP Documentation',
        'head' => $branch,
        'base' => 'main',
        'body' => $message
    ];

    $options = [
        'http' => [
            'header' => [
                "Content-Type: application/json",
                "User-Agent: PHP Script"
            ],
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    if ($result === FALSE) {
        die('Error creating pull request');
    }
    
    return json_decode($result);
}

// Example usage
$repo = 'php/php-src'; // PHP source repository
$branch = 'your-feature-branch'; // Your branch with changes
$message = 'This PR updates the documentation for new features.';
$response = createPullRequest($repo, $branch, $message);

// Display response from GitHub
echo "Pull request created: " . $response->html_url;