// Example PHP code to calculate monthly mortgage payments

// Function to calculate monthly mortgage payment
function calculateMonthlyPayment($loanAmount, $interestRate, $loanTermYears) {
    // Convert annual interest rate to monthly and calculate number of payments
    $monthlyInterestRate = ($interestRate / 100) / 12;
    $numberOfPayments = $loanTermYears * 12;

    // Calculate monthly payment using the formula
    $monthlyPayment = $loanAmount * ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $numberOfPayments)) / (pow(1 + $monthlyInterestRate, $numberOfPayments) - 1);

    // Round to two decimal places
    $monthlyPayment = round($monthlyPayment, 2);

    return $monthlyPayment;
}

// Example usage
$loanAmount = 250000; // Example loan amount in dollars
$interestRate = 3.5; // Example annual interest rate
$loanTermYears = 30; // Example loan term in years

$monthlyPayment = calculateMonthlyPayment($loanAmount, $interestRate, $loanTermYears);
echo "Monthly mortgage payment: $" . $monthlyPayment;