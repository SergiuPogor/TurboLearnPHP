<?php

// Circular References in PHP: Example with SplObjectStorage and __sleep() Methods

namespace App;

// Class A with reference to Class B
class A
{
    public string $name;
    public B $b; // Reference to an instance of Class B

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // To prepare object for serialization, break circular reference with __sleep
    public function __sleep(): array
    {
        // Avoid serializing circular references
        return ['name'];
    }
}

// Class B with reference to Class A
class B
{
    public string $title;
    public A $a; // Reference to an instance of Class A

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    // Avoid serializing circular references by using __sleep
    public function __sleep(): array
    {
        return ['title'];
    }
}

// Method 1: Using __sleep() to Avoid Serialization of Circular References
$a = new A('Class A Object');
$b = new B('Class B Object');

// Assign references to each other
$a->b = $b;
$b->a = $a;

// Serialize objects without circular references
$serializedA = serialize($a);
$serializedB = serialize($b);

// Method 2: Using SplObjectStorage to Manage Circular References
use SplObjectStorage;

class RelationshipManager
{
    public SplObjectStorage $storage;

    public function __construct()
    {
        // Manage unique references without serialization loops
        $this->storage = new SplObjectStorage();
    }

    public function addRelationship(A $a, B $b): void
    {
        $this->storage[$a] = $b;
    }
}

// Initialize RelationshipManager and add circular references
$manager = new RelationshipManager();
$manager->addRelationship($a, $b);

// Output results
echo "Serialized A:\n$serializedA\n";
echo "Serialized B:\n$serializedB\n";

// Unserialize to restore objects without circular dependency issues
$unserializedA = unserialize($serializedA);
$unserializedB = unserialize($serializedB);

print_r($unserializedA);
print_r($unserializedB);