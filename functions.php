<?php 

ob_start();

require_once 'mail_config.php';
require_once 'vendor/autoload.php';
require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function dd($param) : void {
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
    die();
}

function btnMenu(string $param) : string {
    if ($_SERVER['REQUEST_URI'] === $param) {
        return 'bg-gray-900 text-white';
    } else {
        return 'text-gray-300 hover:bg-gray-700 hover:text-white';
    }
}


//// SIGNUP 



function checkExists(string $field, string $user, PDO $pdo) {
    $sql = "SELECT * FROM users WHERE $field = ?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$user]);

    if ($stmt->rowCount() > 0) {
        return true; 
    } else {
        return false;
    }
}

function hashPassword(array $user) {
    $password = $user['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function addUser($hash, $user, $pdo, $token) {
    $sql = "INSERT INTO `users` (username, email, hashed_pass, token) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$user['username'], $user['email'], $hash, $token]);
    
    if ($result) {
        sendMail($user, $token);
        header('Location: signup/success');
        ob_end_flush();
        exit;
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2];
    }
} 

function sendMail($user, $token) {
    $email = $user['email'];
    $username = $user['username'];
    $subject = 'Mail de confirmaton - Jalab corp';
    $message = "Salut ! V'la le lien : http://localhost:5500/signup/success?token=$token";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = SMTP_ENCRYPTION;

    $mail->setFrom($mail->Username);
    $mail->addAddress($email, $username);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    header('Location: signup/success');
    ob_end_flush();
    exit;
}