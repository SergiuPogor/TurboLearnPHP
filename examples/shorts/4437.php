// Example of using PHP PDO for database operations

// Database configuration
$dsn = 'mysql:host=localhost;dbname=mydatabase';
$username = 'username';
$password = 'password';

// Establish a PDO connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Prepare a SQL statement
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");

// Bind parameters
$username = 'example_user';
$stmt->bindParam(':username', $username, PDO::PARAM_STR);

// Execute the statement
$stmt->execute();

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output results (example)
foreach ($results as $row) {
    echo "Username: " . $row['username'] . ", Email: " . $row['email'] . "\n";
}

// Close the connection
$pdo = null;