<?php

// Real-world example comparing strstr vs strpos in PHP

// Scenario: Checking if an email domain is from a specific provider

// Using strstr to get the domain from the email
$email1 = 'user123@example.com';
$domain = strstr($email1, '@');
echo "Domain using strstr: $domain\n";

// Using strpos to check if the email belongs to 'example.com'
$email2 = 'admin@sample.org';
if (strpos($email2, '@example.com') !== false) {
    echo "Email belongs to example.com\n";
} else {
    echo "Different domain\n";
}

// BUT, let's check performance in large data processing
$emails = [
    'contact@service.com',
    'admin@example.com',
    'support@webapp.com',
    'user@example.org',
    'info@example.com'
];

// Using strpos for checking domain presence - Faster!
$matchedEmails = [];
foreach ($emails as $email) {
    if (strpos($email, '@example.com') !== false) {
        $matchedEmails[] = $email;
    }
}
print_r($matchedEmails);

// Using strstr for extracting domain names - More data processing
$domains = [];
foreach ($emails as $email) {
    $domain = strstr($email, '@');
    $domains[] = $domain;
}
print_r($domains);

// Example: Checking content from a file using strstr
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $content = file_get_contents($file);
    if (strstr($content, 'IMPORTANT')) {
        echo "Keyword found using strstr\n";
    }
}

// Using strpos with data from a ZIP archive
function searchInZip(string $zipPath, string $keyword): void {
    $zip = new ZipArchive();
    if ($zip->open($zipPath) === true) {
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $content = $zip->getFromIndex($i);
            if (strpos($content, $keyword) !== false) {
                echo "Found in file $i using strpos\n";
            }
        }
        $zip->close();
    }
}

searchInZip('/tmp/test/input.zip', 'CONFIDENTIAL');

?>