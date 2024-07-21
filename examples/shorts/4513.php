<?php

// Example of lazy loading in PHP

class User
{
    private $userId;
    private $username;
    private $profile;

    public function __construct($userId, $username)
    {
        $this->userId = $userId;
        $this->username = $username;
        // Profile data is loaded lazily only when accessed
        // This could be a heavy operation like fetching from database
    }

    public function getProfile()
    {
        if ($this->profile === null) {
            // Simulating fetching profile data from database
            $this->profile = [
                'fullName' => 'John Doe',
                'email' => 'john.doe@example.com',
                'age' => 30,
                'address' => '123 PHP Street',
                'interests' => ['PHP programming', 'Web development']
            ];
        }
        return $this->profile;
    }
}

// Usage example
$user = new User(1, 'johndoe');

// Profile data is loaded only when getProfile() is called
$profileData = $user->getProfile();

// Output profile data
echo "User's Profile: " . json_encode($profileData);

?>