<?php

class AppConfig
{
    // Static property to hold configuration data
    public static array $settings = [
        'app_name' => 'MySuperApp',
        'version' => '1.0',
        'maintenance_mode' => false,
    ];

    public static function getSetting(string $key)
    {
        return self::$settings[$key] ?? null;
    }

    public static function setSetting(string $key, $value)
    {
        self::$settings[$key] = $value;
    }
}

// Accessing static properties without instantiating the class
echo 'App Name: ' . AppConfig::getSetting('app_name') . PHP_EOL;
echo 'Version: ' . AppConfig::getSetting('version') . PHP_EOL;

// Modifying static property
AppConfig::setSetting('maintenance_mode', true);
echo 'Maintenance Mode: ' . (AppConfig::getSetting('maintenance_mode') ? 'Enabled' : 'Disabled') . PHP_EOL;

// Real-world example with a humorous twist
class JokeFactory
{
    private static array $jokes = [
        "Why do programmers prefer dark mode? Because light attracts bugs!",
        "How many programmers does it take to change a light bulb? None, that's a hardware problem.",
        "Why do Java developers wear glasses? Because they don't see sharp."
    ];

    public static function getRandomJoke()
    {
        $index = array_rand(self::$jokes);
        return self::$jokes[$index];
    }
}

// Adding a joke to lighten up the debugging session
echo JokeFactory::getRandomJoke() . PHP_EOL;

?>