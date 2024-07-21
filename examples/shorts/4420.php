// Example usage of parse_url to extract URL components
$url = "https://example.com/path/to/page?query=string";

$parsed_url = parse_url($url);

echo "Scheme: " . $parsed_url['scheme'] . "\n";
echo "Host: " . $parsed_url['host'] . "\n";
echo "Path: " . $parsed_url['path'] . "\n";
echo "Query: " . $parsed_url['query'] . "\n";