// Example demonstrating PHP exception handling in a botanical finance application
class BotanicalFinance {
    public function calculateInvestment($amount) {
        try {
            if ($amount <= 0) {
                throw new InvalidArgumentException('Investment amount must be positive.');
            }

            // Perform investment calculation
            $result = $amount * 1.05; // Example calculation

            return $result;
        } catch (InvalidArgumentException $e) {
            echo 'Error: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'An unexpected error occurred: ' . $e->getMessage();
        }
    }
}

// Example usage
$botanicalFinance = new BotanicalFinance();
echo $botanicalFinance->calculateInvestment(-100); // Example of handling an invalid argument