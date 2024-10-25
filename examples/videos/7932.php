<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'my_database';
    private $username = 'root';
    private $password = '';
    private $connection;

    // Constructor
    public function __construct() {
        $this->connection = $this->connect();
    }

    // Create connection
    private function connect() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", 
                $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Method to execute a query
    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Method to get all records
    public function getAll($table) {
        $sql = "SELECT * FROM {$table}";
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to insert a record
    public function insert($table, $data) {
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(',:', array_keys($data));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        return $this->query($sql, $data);
    }

    // Method to update a record
    public function update($table, $data, $condition) {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key} = :{$key},";
        }
        $set = rtrim($set, ',');
        $sql = "UPDATE {$table} SET {$set} WHERE {$condition}";
        return $this->query($sql, $data);
    }

    // Method to delete a record
    public function delete($table, $condition) {
        $sql = "DELETE FROM {$table} WHERE {$condition}";
        return $this->query($sql);
    }
}

// Usage example
$db = new Database();
$db->insert('users', ['name' => 'John Doe', 'email' => 'john@example.com']);
$users = $db->getAll('users');
foreach ($users as $user) {
    echo $user['name'] . '<br>';
}