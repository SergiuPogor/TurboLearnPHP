<?php
// Example of using ReflectionMethod to inspect a class method

class User {
    private function getPassword() {
        return 'secret_password';
    }

    public function showPassword() {
        return $this->getPassword();
    }
}

// Create a ReflectionMethod instance for the getPassword method
$reflectionMethod = new ReflectionMethod('User', 'getPassword');

// Check if the method is private
if ($reflectionMethod->isPrivate()) {
    // Invoke the private method
    $user = new User();
    $reflectionMethod->setAccessible(true);
    $password = $reflectionMethod->invoke($user);
    
    echo "The private password is: " . $password; // Output: The private password is: secret_password
}

// Inspecting method details
echo "Method Name: " . $reflectionMethod->getName() . "\n"; // Output: getPassword
echo "Is Public? " . ($reflectionMethod->isPublic() ? 'Yes' : 'No') . "\n"; // Output: No
echo "Is Private? " . ($reflectionMethod->isPrivate() ? 'Yes' : 'No') . "\n"; // Output: Yes