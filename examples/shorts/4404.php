<?php
class User {
    private $profile;
    private $isProfileLoaded = false;

    public function getProfile() {
        if (!$this->isProfileLoaded) {
            // Simulating a time-consuming operation
            $this->profile = $this->loadProfile();
            $this->isProfileLoaded = true;
        }
        return $this->profile;
    }

    private function loadProfile() {
        // Pretend this is a complex and slow database query
        sleep(2); // Simulate delay
        return "User profile loaded after some delay. Magic happens here!";
    }
}

// Example usage
$user = new User();

// This will trigger the deferred initialization
echo "First call: " . $user->getProfile() . "\n";
// This will use the already loaded profile
echo "Second call: " . $user->getProfile() . "\n";

// Adding humor
echo "Wow! The profile loads faster than my morning coffee!\n";
?>