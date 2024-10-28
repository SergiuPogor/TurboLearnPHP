<?php

// Example 1: Using global variables in a simple function
$globalVar = "I am a global variable"; // Global variable

function showGlobalVar()
{
    global $globalVar; // Accessing global variable
    echo $globalVar;
}

showGlobalVar(); // Output: I am a global variable

// Example 2: The potential issue with global variables
$counter = 0; // Global variable

function incrementCounter()
{
    // Uncommenting the next line would throw a notice if $counter is not declared as global
    // $counter++; 
}

incrementCounter();
echo $counter; // Output: 0 (if not using global)

// Example 3: Using a function argument instead of global variable
function incrementCounterByRef(&$count)
{
    $count++;
}

$count = 0; // Local variable
incrementCounterByRef($count);
echo $count; // Output: 1

// Example 4: A cleaner approach using a class
class Counter {
    private $count = 0; // Class variable

    public function increment() {
        $this->count++;
    }

    public function getCount() {
        return $this->count;
    }
}

$counterObj = new Counter();
$counterObj->increment();
echo $counterObj->getCount(); // Output: 1

?>