<?php

/**
 * Useful Links:
 * - GitHub Repository: https://github.com/SergiuPogor/TurboLearnPHP
 * - YouTube Video: https://www.youtube.com/shorts/67F0XZGoU6o
 */

$filename = 'input.csv';

if (!file_exists($filename) || !is_readable($filename)) {
    return false;
}

$rows = [];
$header = null;
if (($handle = fopen($filename, 'rb')) !== false) {
    while (($row = fgetcsv($handle)) !== false) {
        if ($header === null) {
            $header = $row;
            continue;
        }
        $rows[] = array_combine($header, $row);
    }

    fclose($handle);
}

foreach ($rows as $row) {
    print 'First Name: ' . $row['first_name'] . "\n";
}