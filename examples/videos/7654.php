<?php

// OAuth implementation example in PHP with GitHub as an OAuth provider

session_start();

$clientId = 'your_client_id';
$clientSecret = 'your_client_secret';
$redirectUri = 'http://localhost/oauth-callback.php';
$scope = 'user';

// Step 1: Redirect to GitHub OAuth authorization URL
if (!isset($_GET['code'])) {
    $authUrl = "https://github.com/login/oauth/authorize?client_id=$clientId&redirect_uri=$redirectUri&scope=$scope";
    header('Location: ' . $authUrl);
    exit;
}

// Step 2: Handle OAuth callback and exchange authorization code for access token
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $tokenUrl = 'https://github.com/login/oauth/access_token';

    $postData = http_build_query([
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'code' => $code,
        'redirect_uri' => $redirectUri,
    ]);

    $opts = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postData
        ]
    ];

    $context = stream_context_create($opts);
    $response = file_get_contents($tokenUrl, false, $context);

    // Parse the access token response
    parse_str($response, $tokenData);

    if (isset($tokenData['access_token'])) {
        $_SESSION['access_token'] = $tokenData['access_token'];
    }
}

// Step 3: Fetch user information from GitHub using the access token
if (isset($_SESSION['access_token'])) {
    $userApiUrl = 'https://api.github.com/user';
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => [
                'Authorization: token ' . $_SESSION['access_token'],
                'User-Agent: PHP-OAuth-App'  // GitHub requires a User-Agent header
            ]
        ]
    ];

    $context = stream_context_create($opts);
    $userData = file_get_contents($userApiUrl, false, $context);

    // Convert user data from JSON
    $user = json_decode($userData, true);

    // Display user information
    echo "Welcome, " . htmlspecialchars($user['login']) . "!<br>";
    echo "Your GitHub ID is: " . htmlspecialchars($user['id']) . "<br>";
    echo "Your GitHub profile: <a href='" . htmlspecialchars($user['html_url']) . "'>" . htmlspecialchars($user['html_url']) . "</a>";
}

// Handle potential errors
if (isset($tokenData['error'])) {
    echo 'OAuth Error: ' . htmlspecialchars($tokenData['error_description']);
}

// Logout functionality (optional)
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /');
    exit;
}

// Note: In a real-world application, make sure to securely store access tokens and handle session expiration properly.
?>