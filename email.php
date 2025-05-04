<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Function to send loan application email
function sendLoanEmail($toEmail, $trackingCode)
{
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'philemonfinancials@gmail.com'; // Philemon Financials email
        $mail->Password = 'your-email-password'; // App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email details
        $mail->setFrom('philemonfinancials@gmail.com', 'Philemon Financials');
        $mail->addAddress($toEmail);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Loan Application Tracking Code';
        $mail->Body = "Thank you for applying for a loan with <strong>Philemon Financials</strong>. Your tracking code is <strong>$trackingCode</strong>.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}