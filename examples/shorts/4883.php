<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Literal;

// Define custom DQL function
class CustomFunction extends FunctionNode
{
    public $value = null;

    public function parse(Lexer $lexer)
    {
        $lexer->nextToken(); // opening parenthesis
        $this->value = $lexer->string; // function argument
        $lexer->nextToken(); // closing parenthesis
    }

    public function getSql()
    {
        return "CUSTOM_FUNCTION(" . $this->value . ")";
    }
}

// Configure Doctrine
$paths = [__DIR__ . "/src"];
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// Register custom DQL function
$config->addCustomStringFunction('CUSTOM_FUNCTION', CustomFunction::class);

// Create EntityManager
$entityManager = EntityManager::create($connectionOptions, $config);

// Example DQL query using custom function
$query = $entityManager->createQuery(
    "SELECT u FROM App\Entity\User u WHERE CUSTOM_FUNCTION(u.field) = :value"
);
$query->setParameter('value', 'desired_value');

// Execute query
$results = $query->getResult();