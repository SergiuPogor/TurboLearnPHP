<?php

class MagicMethods
{
    public function __call($name, $arguments)
    {
        echo "You tried to call a method named '$name' with arguments: " . implode(', ', $arguments) . PHP_EOL;
    }
}

$object = new MagicMethods();

// Dynamic method call using call_user_func
call_user_func([$object, 'nonExistentMethod'], 'foo', 'bar');

// Dynamic method call using call_user_func_array
call_user_func_array([$object, 'anotherNonExistentMethod'], ['baz', 'qux']);

// Real-world example with a twist of humor
class JokeTeller
{
    public function tellJoke($setup, $punchline)
    {
        echo $setup . ' ... ' . $punchline . PHP_EOL;
    }
}

$joke = new JokeTeller();

// Use dynamic call to tell a joke
call_user_func([$joke, 'tellJoke'], 'Why do PHP developers prefer dark mode?', 'Because light attracts bugs!');

// Example with arguments
call_user_func_array([$joke, 'tellJoke'], ['Why do functions always break up?', 'Because they have too many arguments!']);

// Adding a random joke to keep things light
echo "Debugging is like being the detective in a crime movie where you are also the murderer.";
?>