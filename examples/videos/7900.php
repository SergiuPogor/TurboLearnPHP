<?php

// Define a Database Connection Manager for handling multiple databases dynamically
class ConnectionManager
{
    private array $connections = []; // Store all database connections
    private string $default = 'db1'; // Default connection identifier
    
    public function __construct()
    {
        // Initialize connections with different databases
        $this->connections['db1'] = $this->createConnection('mysql:host=localhost;dbname=app1', 'user1', 'pass1');
        $this->connections['db2'] = $this->createConnection('mysql:host=localhost;dbname=app2', 'user2', 'pass2');
    }

    /**
     * Creates a new PDO connection.
     */
    private function createConnection(string $dsn, string $username, string $password): PDO
    {
        return new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /**
     * Get a connection by name or the default connection.
     */
    public function getConnection(string $name = null): PDO
    {
        $name = $name ?? $this->default;
        
        if (!isset($this->connections[$name])) {
            throw new InvalidArgumentException("Connection '$name' not found.");
        }
        
        return $this->connections[$name];
    }

    /**
     * Set default connection name.
     */
    public function setDefault(string $name): void
    {
        if (!isset($this->connections[$name])) {
            throw new InvalidArgumentException("Connection '$name' does not exist.");
        }
        
        $this->default = $name;
    }
}

// Usage of ConnectionManager
try {
    $manager = new ConnectionManager();

    // Fetch default connection
    $db = $manager->getConnection();
    $query = $db->query("SELECT * FROM users WHERE active = 1");
    $activeUsersDb1 = $query->fetchAll();

    // Switch to another database
    $manager->setDefault('db2');
    $db = $manager->getConnection(); // This now fetches connection for 'db2'
    $query = $db->query("SELECT * FROM users WHERE active = 1");
    $activeUsersDb2 = $query->fetchAll();

    // Directly retrieve specific database
    $db1 = $manager->getConnection('db1');
    $db2 = $manager->getConnection('db2');

    // Use both connections to fetch specific data
    $productCountDb1 = $db1->query("SELECT COUNT(*) FROM products")->fetchColumn();
    $productCountDb2 = $db2->query("SELECT COUNT(*) FROM products")->fetchColumn();

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (InvalidArgumentException $e) {
    echo "Connection error: " . $e->getMessage();
}