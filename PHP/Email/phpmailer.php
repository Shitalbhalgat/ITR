<?php
// Load PHPMailer classes
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // SMTP server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@gmail.com';     // Your Gmail address
    $mail->Password   = 'your_app_password';        // App password (not Gmail password)
    $mail->SMTPSecure = 'ssl';                      // SSL encryption
    $mail->Port       = 465;

    // Sender and recipient
    $mail->setFrom('your_email@gmail.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email using PHPMailer without Composer';
    $mail->Body    = '<h1>This is an HTML Email</h1><p>Sent without using Composer.</p>';
    $mail->AltBody = 'This is the plain text version of the email content.';

    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
/*
1)Go to: https://github.com/PHPMailer/PHPMailer and download the latest release
2)If you're using Gmail, you must use an App Password, not your regular Gmail password:
3)to use an app password:
       1)Enable 2-Step Verification on your Google account

        2)Generate an App Password:
           Go to: https://myaccount.google.com/apppasswords

        3)Use that password in:
           $mail->Password = 'your_app_password';
?>


