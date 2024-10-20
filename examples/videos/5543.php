<?php
// Display available PDO drivers
function displayPdoDrivers() {
    $drivers = PDO::getAvailableDrivers();

    if (empty($drivers)) {
        echo "No PDO drivers available.\n";
        return;
    }

    echo "Available PDO Drivers:\n";
    foreach ($drivers as $driver) {
        echo "- " . $driver . "\n";
    }
}

// Check if PDO is installed and available
if (!extension_loaded('pdo')) {
    echo "PDO extension is not available. Please install it.\n";
    exit;
}

// Show PDO drivers
displayPdoDrivers();

// Example of creating a PDO instance using a specific driver
function createPdoConnection($dsn, $username, $password) {
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully using DSN: " . $dsn . "\n";
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "\n";
        return null;
    }
}

// Example DSN strings for MySQL and SQLite
$mysqlDsn = "mysql:host=localhost;dbname=testdb";
$sqliteDsn = "sqlite:" . __DIR__ . "/database.sqlite";

// Create MySQL connection
$mysqlConnection = createPdoConnection($mysqlDsn, "root", "password");

// Create SQLite connection
$sqliteConnection = createPdoConnection($sqliteDsn, null, null);

// Example of executing a query using the MySQL connection
if ($mysqlConnection) {
    $stmt = $mysqlConnection->prepare("SELECT * FROM users WHERE status = :status");
    $status = 'active';
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Active Users:\n";
    print_r($results);
}

// Close connections
$mysqlConnection = null;
$sqliteConnection = null;
?>