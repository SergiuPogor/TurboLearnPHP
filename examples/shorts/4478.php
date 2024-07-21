<?php
// PHP 8.3 Symfony Entity Manager Closed Error Fix - Advanced Solution
// Handle and reopen the Entity Manager with a touch of humor

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;

class EntityManagerHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function ensureEntityManagerOpen(): void
    {
        if (!$this->entityManager->isOpen()) {
            echo "Oops! The Entity Manager is closed. Time to reopen it!";
            $this->entityManager = $this->entityManager->create(
                $this->entityManager->getConnection(),
                $this->entityManager->getConfiguration()
            );
        }
    }

    public function doDatabaseOperation(callable $operation): void
    {
        $this->ensureEntityManagerOpen();
        try {
            $this->entityManager->beginTransaction();
            $operation($this->entityManager);
            $this->entityManager->commit();
        } catch (ORMException $e) {
            $this->entityManager->rollback();
            echo "Transaction failed: " . $e->getMessage() . ". Rolling back and retrying!";
            $this->ensureEntityManagerOpen();
            $this->doDatabaseOperation($operation); // Retry the operation
        }
    }
}

// Usage example
$entityManager = // Obtain your EntityManager instance
$handler = new EntityManagerHandler($entityManager);

$handler->doDatabaseOperation(function(EntityManagerInterface $em) {
    // Perform database operations
    $newEntity = new YourEntity();
    $newEntity->setSomeField('Some value');
    $em->persist($newEntity);
    $em->flush();
    
    echo "Database operation completed successfully!";
});
?>