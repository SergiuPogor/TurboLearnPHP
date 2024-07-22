<?php
// Sample array
$userData = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com'
];

// Accessing array safely using isset
$userName = isset($userData['name']) ? $userData['name'] : 'Guest';
echo "User Name: $userName<br>";

// Accessing array safely using null coalescing operator
$userPhone = $userData['phone'] ?? 'Not provided';
echo "User Phone: $userPhone<br>";

// Example of how it prevents errors
function getUserDetail(array $data, string $key): string {
    return $data[$key] ?? 'Detail not available';
}

echo "User Email: " . getUserDetail($userData, 'email') . "<br>";
echo "User Address: " . getUserDetail($userData, 'address') . "<br>";
?>
<!-- HTML Form for demonstration -->
<form method="post">
    <input type="text" name="user_input" placeholder="Enter some data">
    <button type="submit">Submit</button>
</form>