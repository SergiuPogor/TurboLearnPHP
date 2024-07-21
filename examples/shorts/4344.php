// Example PHP code for managing user consent

// Function to display a consent form
function displayConsentForm() {
    echo '<form method="post" action="consent.php">';
    echo '<label for="consent">I agree to the terms and conditions</label>';
    echo '<input type="checkbox" id="consent" name="consent" required>';
    echo '<button type="submit">Submit</button>';
    echo '</form>';
}

// Function to handle form submission and save consent
function handleConsent() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['consent'])) {
        $user_id = 123; // Replace with dynamic user ID
        $consent = $_POST['consent'];
        $timestamp = time();
        
        // Connect to the database
        $conn = new mysqli("localhost", "username", "password", "database");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Save consent to the database
        $stmt = $conn->prepare("INSERT INTO user_consent (user_id, consent, timestamp) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $consent, $timestamp);
        $stmt->execute();
        
        // Close connection
        $stmt->close();
        $conn->close();
        
        echo "Consent recorded successfully.";
    } else {
        echo "Consent not provided.";
    }
}

// Display the consent form
displayConsentForm();

// Handle form submission if any
handleConsent();