// Example PHP code demonstrating late static binding

// Parent class
class ParentClass {
    public static function whoAmI() {
        return static::class;
    }
}

// Child class extending ParentClass
class ChildClass extends ParentClass {
}

// Another child class extending ParentClass
class AnotherChildClass extends ParentClass {
}

// Calling static method using late static binding
echo ChildClass::whoAmI() . "\n"; // Output: ChildClass
echo AnotherChildClass::whoAmI() . "\n"; // Output: AnotherChildClass