// Example demonstrating SplObjectStorage in PHP
$object1 = new stdClass();
$object2 = new stdClass();

// Create SplObjectStorage instance
$storage = new SplObjectStorage();

// Attach objects with associated data
$storage[$object1] = "Data for object 1";
$storage[$object2] = "Data for object 2";

// Check if an object exists in storage
if ($storage->contains($object1)) {
    echo $storage[$object1]; // Outputs: Data for object 1
}

// Iterate through all objects in storage
foreach ($storage as $object) {
    echo $storage[$object] . "\n";
}