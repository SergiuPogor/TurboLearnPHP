<?php

/**
 * Useful Links:
 * - GitHub Repository: https://github.com/SergiuPogor/TurboLearnPHP
 * - Related Article: https://medium.com/@256cub/free-php-google-serp-keyword-rank-checker-367e2577cd3e
 */

// Your Google API Key
// https://console.cloud.google.com/apis/library/customsearch.googleapis.com?project=
// Credentials -> Create Credentials -> API Key
$apiKey = 'YOUR_API_KEY';

// Your Custom Search Engine ID
// https://cse.google.com/cse/all
// Add New -> Fill with data
// Final result will be like this: https://cse.google.com/cse.js?cx=*** -> copy only the ID
$searchEngineId = 'YOUR_SEARCH_ENGINE_ID';

// The query keyword
$keyword = 'keyword';

// The site you're checking the ranking for
$siteToCheck = 'example.com';

// Google Host
// https://developers.google.com/custom-search/docs/xml_results_appendices#countryCodes
$gl = 'us';

// User Language
// https://developers.google.com/custom-search/docs/xml_results_appendices#interfaceLanguages
$hl = 'en';

// Google Custom Search JSON API URL
$apiUrl = 'https://www.googleapis.com/customsearch/v1?key=' . urlencode($apiKey) . '&cx=' . urlencode($searchEngineId) . '&q=' . urlencode($keyword) . '&gl=' . urlencode($gl) . '&hl=' . urlencode($hl);

// Make the API request
$response = file_get_contents($apiUrl);

// Decode the response
$results = json_decode($response, true);

// Initialize the rank to -1 indicating not found
$rank = -1;

// Check if there are items returned
if (!empty($results['items'])) {
    foreach ($results['items'] as $index => $item) {

        // Display results
        render($item);

        // Check if the link contains the site we're looking for
        if (strpos($item['link'], $siteToCheck) !== false) {
            $rank = $index + 1;
            // break;
        }
    }
}

// Display the rank
if ($rank === -1) {
    print 'Site not found in the top results.\n';
} else {
    print 'Site ranking position: ' . $rank;
}


function render($item)
{
    // HTML Output
    print '<div style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px;">';
    print '<h2><a href="' . $item['link'] . '" target="_blank">' . $item['title'] . '</a></h2>';
    print '<p>' . $item['snippet'] . '</p>';
    print '<p><strong>Website:</strong> <a href="' . $item['link'] . '" target="_blank">' . $item['formattedUrl'] . '</a></p>';
    print '</div>';
}
