<?php 

require_once 'views/signup-success.view.php';
require_once './functions.php';
require_once './db_config.php';

if (!empty($_GET['token'])) {
    $token = $_GET['token'];
    $checkToken = checkExists('token', $token, $pdo);

    if ($checkToken) {
        header('Location: ../login');
        ob_end_flush();
    }
}