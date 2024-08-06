<?php
// Define locale and text domain
$locale = 'es_ES';
$textDomain = 'messages';
$localeDir = '/tmp/locale';

// Set locale environment
putenv("LC_ALL=$locale");
setlocale(LC_ALL, $locale);

// Bind text domain to the directory with translation files
bindtextdomain($textDomain, $localeDir);

// Set encoding for the text domain
bind_textdomain_codeset($textDomain, 'UTF-8');

// Set default domain
textdomain($textDomain);

// Fetch and display a translated string
echo gettext("Hello, World!");

// Ensure translation files are in /tmp/locale/es_ES/LC_MESSAGES/messages.mo
?>