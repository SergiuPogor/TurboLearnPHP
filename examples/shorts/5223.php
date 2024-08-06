<?php
// Example data
$items = [
    'first' => 'apple',
    'second' => 'banana',
    'third' => 'cherry'
];

// Count elements using sizeof() - identical to count()
$elementCount = sizeof($items);

// Example with an object
class SampleObject {
    public $prop1 = 'value1';
    public $prop2 = 'value2';
}

$object = new SampleObject();
$objectPropertiesCount = sizeof(get_object_vars($object));

// Output results
echo "Number of elements in array: " . $elementCount . PHP_EOL;
echo "Number of properties in object: " . $objectPropertiesCount . PHP_EOL;
?>