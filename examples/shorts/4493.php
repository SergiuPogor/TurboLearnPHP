<?php

use Doctrine\DBAL\Connection;

class TransactionManager
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function performComplexOperation(): void
    {
        $this->connection->beginTransaction();
        
        try {
            // Perform outer transaction operations
            
            // Begin nested transaction
            $this->connection->beginTransaction();
            
            try {
                // Perform inner transaction operations
                
                // Commit inner transaction
                $this->connection->commit();
            } catch (\Throwable $e) {
                // Rollback inner transaction on failure
                $this->connection->rollBack();
                throw $e;
            }
            
            // Continue outer transaction operations
            
            // Commit outer transaction
            $this->connection->commit();
        } catch (\Throwable $e) {
            // Rollback outer transaction on failure
            $this->connection->rollBack();
            throw $e;
        }
    }
}

// Example usage
$entityManager = $container->get('doctrine')->getManager();
$transactionManager = new TransactionManager($entityManager->getConnection());
$transactionManager->performComplexOperation();