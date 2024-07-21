<?php

// Example: Lazy Loading with Autoloading in PHP

// Autoload function using spl_autoload_register
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

// Usage of lazy loaded class
$obj = new LazyLoadedClass();
$obj->performAction();

// LazyLoadedClass definition in classes/LazyLoadedClass.php
class LazyLoadedClass {
    public function __construct() {
        // Constructor logic
    }
    
    public function performAction() {
        // Method logic
    }
}

?>