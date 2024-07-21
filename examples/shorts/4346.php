// Example PHP code to track coffee spending

// Function to log a coffee purchase
function logCoffeePurchase($amount, $date, $description) {
    // Connect to the database
    $conn = new mysqli("localhost", "username", "password", "database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the purchase into the database
    $stmt = $conn->prepare("INSERT INTO coffee_spending (amount, date, description) VALUES (?, ?, ?)");
    $stmt->bind_param("dss", $amount, $date, $description);
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    echo "Coffee purchase logged successfully.";
}

// Function to get total coffee spending
function getTotalCoffeeSpending() {
    // Connect to the database
    $conn = new mysqli("localhost", "username", "password", "database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the total spending
    $result = $conn->query("SELECT SUM(amount) AS total FROM coffee_spending");
    $row = $result->fetch_assoc();

    // Close connection
    $conn->close();

    return $row['total'];
}

// Log a new coffee purchase
logCoffeePurchase(4.50, "2024-06-27", "Latte at local cafe");

// Get and display the total coffee spending
$totalSpending = getTotalCoffeeSpending();
echo "Total coffee spending: $" . $totalSpending;