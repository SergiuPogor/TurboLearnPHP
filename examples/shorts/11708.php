<?php

// Example of Class vs Interface in a real-world scenario

// 1. Using a Class (Tightly Coupled)
class StripePayment {
    public function pay(float $amount): void {
        echo "Paid $amount using Stripe\n";
    }
}

class OrderProcessor {
    private StripePayment $payment;

    public function __construct(StripePayment $payment) {
        $this->payment = $payment;
    }

    public function process(float $amount): void {
        $this->payment->pay($amount);
    }
}

$order = new OrderProcessor(new StripePayment());
$order->process(120.50);

// The above is tightly coupled, switching payment methods would require changing the class.

// 2. Using an Interface (Loosely Coupled)
interface PaymentInterface {
    public function pay(float $amount): void;
}

class PayPalPayment implements PaymentInterface {
    public function pay(float $amount): void {
        echo "Paid $amount using PayPal\n";
    }
}

class BankTransferPayment implements PaymentInterface {
    public function pay(float $amount): void {
        echo "Paid $amount using Bank Transfer\n";
    }
}

class FlexibleOrderProcessor {
    private PaymentInterface $payment;

    public function __construct(PaymentInterface $payment) {
        $this->payment = $payment;
    }

    public function process(float $amount): void {
        $this->payment->pay($amount);
    }
}

// Switching payment methods is now easy without changing the core logic
$order1 = new FlexibleOrderProcessor(new PayPalPayment());
$order1->process(200.75);

$order2 = new FlexibleOrderProcessor(new BankTransferPayment());
$order2->process(350.00);

// Reading payment data from a file to dynamically choose the payment method
$filePath = '/tmp/test/input.txt';
if (file_exists($filePath)) {
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $paymentType = strtolower(trim($line));
        $payment = match ($paymentType) {
            'paypal' => new PayPalPayment(),
            'bank' => new BankTransferPayment(),
            default => new StripePayment()
        };

        $orderProcessor = new FlexibleOrderProcessor($payment);
        $orderProcessor->process(rand(100, 1000)); // Random amount for demo
    }
}
?>