<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// composer require phpmailer/phpmailer

require 'vendor/autoload.php'; // Load Composer's autoloader

$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();                                      // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'your_email@gmail.com';             // SMTP username
    $mail->Password = 'your_password';                    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('your_email@gmail.com', 'Mailer');
    $mail->addAddress('recipient_email@example.com', 'Recipient Name');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = '<h1>Welcome</h1><p>This is a <strong>HTML</strong> email.</p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Adding an attachment
    $mail->addAttachment('/path/to/file.jpg', 'newname.jpg');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
