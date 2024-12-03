<?php
// Using str_replace
$text = "Hello World!";
$replacements = ["Hello" => "Hi", "World" => "Earth"];
$resultReplace = str_replace(array_keys($replacements), array_values($replacements), $text);
echo $resultReplace; // Outputs: Hi Earth!

// Using strtr
$text = "Hello World!";
$map = ["Hello" => "Hi", "World" => "Earth"];
$resultTr = strtr($text, $map);
echo $resultTr; // Outputs: Hi Earth!

// Performance Comparison
$text = str_repeat("Hello World! ", 1000);

// str_replace Performance
$start = microtime(true);
$resultReplace = str_replace(array_keys($replacements), array_values($replacements), $text);
$timeReplace = microtime(true) - $start;

// strtr Performance
$start = microtime(true);
$resultTr = strtr($text, $map);
$timeTr = microtime(true) - $start;

echo "str_replace time: $timeReplace seconds\n";
echo "strtr time: $timeTr seconds\n";
?>