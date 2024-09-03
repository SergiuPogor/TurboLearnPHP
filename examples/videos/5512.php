<?php

// Enable internal XML error handling
libxml_use_internal_errors(true);

// Example XML data with errors
$xmlData = '<root><item>Sample</item></rootx>'; // Note the malformed tag

// Try to parse the XML data
$xml = simplexml_load_string($xmlData);

// Check for XML parsing errors
if ($xml === false) {
    echo "Failed to parse XML. Errors:" . PHP_EOL;
    $errors = libxml_get_errors();
    
    foreach ($errors as $error) {
        echo "Error code: {$error->code}, Message: {$error->message}, Line: {$error->line}" . PHP_EOL;
    }
    
    // Clear the errors
    libxml_clear_errors();
} else {
    echo "XML parsed successfully!" . PHP_EOL;
    print_r($xml);
}

// Disable internal XML error handling if needed
libxml_use_internal_errors(false);

?>