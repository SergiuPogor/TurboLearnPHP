<?php
// Example 1: Basic usage of class_parents()
// Let's say we have a class hierarchy in a system, and we want to dynamically inspect 
// the parent classes of a given class.

class Vehicle {}
class Car extends Vehicle {}
class ElectricCar extends Car {}

$parents = class_parents(ElectricCar::class);
print_r($parents);

// Output:
// Array
// (
//     [Car] => Car
//     [Vehicle] => Vehicle
// )

// Example 2: Dynamic checking in large systems
// Suppose you’re working with a plugin system where each plugin class could extend
// different base classes. You need to ensure that a class extends a certain parent.

class PluginBase {}
class AudioPlugin extends PluginBase {}
class VideoPlugin extends PluginBase {}

function hasParent($class, $parent) {
    $parents = class_parents($class);
    return in_array($parent, $parents);
}

// Example use case
if (hasParent(AudioPlugin::class, PluginBase::class)) {
    echo "AudioPlugin extends PluginBase\n";
} else {
    echo "AudioPlugin does not extend PluginBase\n";
}

// Example 3: Iterating over parent classes and adding behavior
// In a large system, we may want to attach behaviors depending on the hierarchy of 
// the class. Let's automatically add logging if any parent class is `Loggable`.

class Loggable {}
class Service extends Loggable {}
class PaymentService extends Service {}

$service = new PaymentService();

function attachLogging($classInstance) {
    $parents = class_parents(get_class($classInstance));
    
    if (in_array(Loggable::class, $parents)) {
        echo "Attaching logging to " . get_class($classInstance) . "\n";
        // Logic to attach logging
    }
}

attachLogging($service);  // Will attach logging because Service extends Loggable

// Example 4: Handling parent class analysis in unit testing
// During unit testing, you can ensure a class structure is maintained by checking its 
// parent classes.

class Animal {}
class Mammal extends Animal {}
class Dog extends Mammal {}

function checkClassInheritance($class, $expectedParents) {
    $actualParents = class_parents($class);
    foreach ($expectedParents as $parent) {
        if (!isset($actualParents[$parent])) {
            throw new Exception("$class does not extend $parent as expected.");
        }
    }
    echo "$class extends all expected classes.\n";
}

// Check Dog class hierarchy in a test case
checkClassInheritance(Dog::class, [Mammal::class, Animal::class]);

// Example 5: Implementing dynamic behavior based on class hierarchy
// In a real-world application, you may want to implement features that vary depending 
// on the inheritance chain of objects. Let's say we want to customize serialization 
// logic depending on the parent classes.

class SerializableBase {}
class User extends SerializableBase {}
class AdminUser extends User {}

function serializeObject($object) {
    $parents = class_parents(get_class($object));

    if (in_array(SerializableBase::class, $parents)) {
        echo "Serializing " . get_class($object) . " using custom logic\n";
        // Custom serialization logic for SerializableBase descendants
    } else {
        echo "Default serialization for " . get_class($object) . "\n";
    }
}

$user = new AdminUser();
serializeObject($user);  // Will use custom logic because AdminUser extends SerializableBase

// Example 6: Real-world application: Analyzing a complex inheritance chain
// Imagine a CMS system where components are composed of various modules.
// You need to analyze a module class's parent hierarchy to load necessary dependencies.

class Module {}
class ContentModule extends Module {}
class BlogModule extends ContentModule {}

function loadDependenciesForModule($moduleClass) {
    $parents = class_parents($moduleClass);
    
    foreach ($parents as $parent) {
        echo "Loading dependencies for $parent\n";
        // Load specific dependencies for each parent class
    }
}

loadDependenciesForModule(BlogModule::class);

// Edge Case: class_parents() when no parents exist
class StandAlone {}
$no_parents = class_parents(StandAlone::class);
if (empty($no_parents)) {
    echo "StandAlone has no parent classes.\n";
}
?>