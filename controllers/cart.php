<?php 

session_start();

require_once 'dotenv.php';
require_once 'functions.php';
require_once './db_config.php';

if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

require_once 'views/cart.view.php';