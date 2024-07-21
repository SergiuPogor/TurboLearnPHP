<?php
// Namespaces in PHP
// Organizing code by grouping related classes, interfaces, and functions together

namespace Fruit;

class Banana {
    public function getName() {
        return "Banana";
    }
}

class Apple {
    public function getName() {
        return "Apple";
    }
}

// Usage in real application
namespace Main;

use Fruit\Banana;
use Fruit\Apple;

$banana = new Banana();
$apple = new Apple();

echo "Fruit name: " . $banana->getName() . "\n";
echo "Fruit name: " . $apple->getName() . "\n";

// PHP namespaces: because your code deserves to live in a classy neighborhood!
// P.S. If only fruits could organize themselves this well!
?>