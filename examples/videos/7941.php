<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'your_database';
    private $username = 'your_username';
    private $password = 'your_password';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = null;
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
}

// Usage example
$db = new Database();

// Fetch all users
$users = $db->fetchAll("SELECT * FROM users");
foreach ($users as $user) {
    echo "User: " . $user['name'] . "\n";
}

// Fetch a single user
$user = $db->fetchOne("SELECT * FROM users WHERE id = ?", [1]);
echo "Single User: " . $user['name'] . "\n";

// Insert a new user
$db->execute("INSERT INTO users (name, email) VALUES (?, ?)", ['John Doe', 'john@example.com']);
?>