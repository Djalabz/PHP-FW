<?php

ob_start();

require_once 'views/signup.view.php';
require_once './functions.php';
require_once './db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
    $_POST['password'] === $_POST['confirm-password']) {

    $user = ['username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirm' => $_POST['confirm-password']];

    $user['username'] = htmlspecialchars($_POST['username']);

    if (!empty($user['email']) && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        die("Format de l'email non conforme");
    }
    
    $checkEmail = checkExists('email', $user['email'], $pdo);
    $checkName = checkExists('username', $user['username'], $pdo);

    if (!$checkEmail && !$checkName) {

        $hash = hashPassword($user);
        $token = bin2hex(random_bytes(16));
        addUser($hash, $user, $pdo, $token);
        sendEmail($user, $token);

    } elseif ($checkEmail) {
        die('Email déjà pris');
    } elseif ($checkName) {
        die('Nom déjà pris');
    }

} elseif ($_POST['password'] !== $_POST['confirm-password']) {
    die('Les mots de passes sont différents');
} 




