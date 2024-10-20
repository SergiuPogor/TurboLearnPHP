<?php

// Example: Using bind_textdomain_codeset() to fix character encoding in gettext translations

// Scenario 1: Set up gettext translations for a multi-language app

// Define text domain and localization directory
$domain = 'messages';
$localeDir = '/tmp/test/locale'; // Path to locale directory where .mo files are stored

// Set the locale to French as an example
setlocale(LC_ALL, 'fr_FR.utf8');

// Specify the text domain (translation file)
bindtextdomain($domain, $localeDir);

// Ensure UTF-8 encoding for the domain translations
bind_textdomain_codeset($domain, 'UTF-8');

// Load the translation for the domain
textdomain($domain);

// Scenario 2: Handling user-generated content in multiple languages

$userLocale = 'es_ES.utf8'; // Assume the user selects Spanish

setlocale(LC_ALL, $userLocale);
bindtextdomain('messages', $localeDir);
bind_textdomain_codeset('messages', 'UTF-8');
textdomain('messages');

// Translate a message
echo _("Hello, World!"); // This should translate to "¡Hola, Mundo!" if the translation exists in the .mo file

// Scenario 3: Dynamic switch between different languages based on user selection

function switchLanguage($locale)
{
    setlocale(LC_ALL, $locale);
    bindtextdomain('messages', '/tmp/test/locale');
    bind_textdomain_codeset('messages', 'UTF-8');
    textdomain('messages');
}

// Switch to German
switchLanguage('de_DE.utf8');
echo _("Good Morning!"); // Output should be "Guten Morgen!" if translation exists

// Switch to Japanese
switchLanguage('ja_JP.utf8');
echo _("Good Morning!"); // Output should be "おはようございます！" if translation exists

// Scenario 4: Ensure correct encoding for emails or external services using gettext translations
$emailLocale = 'ru_RU.utf8'; // Russian locale
setlocale(LC_ALL, $emailLocale);
bindtextdomain('messages', '/tmp/test/locale');
bind_textdomain_codeset('messages', 'UTF-8');

// Fetch the translated email subject line in UTF-8
$emailSubject = _("Your Order Confirmation");

// Send email using a library that requires proper encoding
mail('user@example.com', $emailSubject, $messageBody);

// Scenario 5: Use gettext with fallback mechanisms for unsupported locales

$preferredLocale = 'zh_CN.utf8'; // Chinese Simplified
$defaultLocale = 'en_US.utf8';    // Default to English if translation is missing

// Try setting the preferred locale
if (!setlocale(LC_ALL, $preferredLocale)) {
    // Fallback to default locale
    setlocale(LC_ALL, $defaultLocale);
}

// Bind textdomain and ensure UTF-8 encoding
bindtextdomain('messages', '/tmp/test/locale');
bind_textdomain_codeset('messages', 'UTF-8');
textdomain('messages');

// Translate a phrase
echo _("Welcome to our website!"); // Will show the Chinese or fallback to English depending on locale availability

// Scenario 6: Detect if translations are available in the requested language and fallback gracefully

$availableLocales = ['fr_FR.utf8', 'es_ES.utf8', 'ru_RU.utf8', 'en_US.utf8']; // List of supported locales

function detectLocale($preferredLocale, $fallback = 'en_US.utf8')
{
    global $availableLocales;

    // Check if preferred locale is available
    if (in_array($preferredLocale, $availableLocales)) {
        setlocale(LC_ALL, $preferredLocale);
    } else {
        // Fallback to default locale
        setlocale(LC_ALL, $fallback);
    }

    bindtextdomain('messages', '/tmp/test/locale');
    bind_textdomain_codeset('messages', 'UTF-8');
    textdomain('messages');
}

// User prefers German, but it is not available, so it will fallback to English
detectLocale('de_DE.utf8');

// The translation will fallback to English
echo _("Thank you for your purchase!");

?>