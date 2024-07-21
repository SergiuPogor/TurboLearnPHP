// Example code to handle XZ error in PHP API-Platform
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

// Ensure consistent serialization format
$normalizer = new ObjectNormalizer(null, null, null, null, null, null, [
    AbstractNormalizer::IGNORED_ATTRIBUTES => ['ignore_this'],
]);