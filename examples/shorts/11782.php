<?php
// Demonstrating Public, Private, and Protected in PHP

class ExampleVisibility
{
    public string $publicProperty = 'I am public'; 
    private string $privateProperty = 'I am private'; 
    protected string $protectedProperty = 'I am protected';

    public function showPublic()
    {
        return $this->publicProperty; 
    }

    private function showPrivate()
    {
        return $this->privateProperty; 
    }

    protected function showProtected()
    {
        return $this->protectedProperty; 
    }
}

// Public: Access directly or via methods
$example = new ExampleVisibility();
echo $example->showPublic(); // Access allowed
// echo $example->publicProperty; // Allowed, but risky for sensitive data

// Private: Strict encapsulation
class PrivateAccess extends ExampleVisibility
{
    public function showPrivateHack()
    {
        // echo $this->privateProperty; // Will cause an error - private is not inherited
        return 'Private is inaccessible here!';
    }
}

// Protected: Controlled inheritance
class ProtectedAccess extends ExampleVisibility
{
    public function showProtectedChild()
    {
        return $this->showProtected(); // Accessible due to inheritance
    }
}

$child = new ProtectedAccess();
echo $child->showProtectedChild(); // Works safely for inheritance logic

// Reminder: Prefer private for sensitive data, protected for shared logic, and public for external APIs or open data.
?>