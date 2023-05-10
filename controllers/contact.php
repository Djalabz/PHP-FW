<?php 

ob_start();

require_once 'views/contact.view.php';

require_once 'mail_config.php';
require_once 'vendor/autoload.php';

// require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';
// require_once 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    if (empty($email) || empty($subject) || empty($message)) {
        die("Remplissez tous les champs !");
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);


    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = SMTP_ENCRYPTION;

    $mail->setFrom($email);
    $mail->addAddress($mail->Username, 'Jalab');
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    header('Location: contact/success');
    ob_end_flush();
    exit;
}