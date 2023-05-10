<?php

ob_start();


require_once 'views/login.view.php';
require_once './db_config.php';

$username = htmlspecialchars($_POST['username']);

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);

$result = $stmt->fetch();

if ($result) {
    $password = $_POST['password'];
    $hash = $result['hashed_password'];
    $compare = comparePasswords($password, $hash);
} else {
    die('Nom introuvable');
}

if ($compare) {
    session_start();
    $_SESSION['user'] = $result; 
    $_SESSION['user']['logged'] = true;
    header('Location:profile');
    ob_end_flush();
    exit;
} else {
    die('Mot de passe erronné');
}

function comparePasswords($password, $hash) {
    $check = password_verify($password, $hash);
    if ($check) {
        return true;
    } else {
        return false;
    }
} 

require_once 'views/product.view.php';