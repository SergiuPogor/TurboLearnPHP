<?php
// Set up locale and bind text domain for translations
$locale = 'fr_FR';
$textDomain = 'messages';
$localeDir = '/tmp/locale';

// Set environment for locale
putenv("LC_ALL=$locale");
setlocale(LC_ALL, $locale);

// Bind text domain to the directory with translation files
bindtextdomain($textDomain, $localeDir);

// Specify the default domain
textdomain($textDomain);

// Define count for plural forms
$count = 2;

// Fetch and display the appropriate translation
echo ngettext("You have one new message.", 
               "You have %d new messages.", 
               $count);

// Ensure translation files exist in /tmp/locale/fr_FR/LC_MESSAGES/messages.mo
?>