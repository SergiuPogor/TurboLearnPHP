<?php
// Example with global variable
$globalVar = "I am global";

function testGlobal() {
    global $globalVar;
    echo $globalVar;
}

testGlobal(); // Outputs: I am global

// Example with static variable
function testStatic() {
    static $staticVar = 0;
    $staticVar++;
    echo $staticVar;
}

testStatic(); // Outputs: 1
testStatic(); // Outputs: 2 (value persists across calls)

?>