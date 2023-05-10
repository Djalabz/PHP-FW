<?php 


session_start();

require_once 'dotenv.php';
require_once 'functions.php';
require_once './db_config.php';

$product_id = $_GET['id'];
$url = "https://fakestoreapi.com/products/$product_id";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    var_dump($e);
} else {
    $product = json_decode($resp, true);
}

if ($_GET['action'] === 'add') {
    if (empty($_SESSION['cart'][$_GET['id']])) {
        $_SESSION['cart'][$_GET['id']] = array('id' => $product['id'], 'title' => $product['title'], 'price' => $product['price'], 'description' => $product['description'], 'quantity' => 1); 
        var_dump($_SESSION['cart']);
        header('Location: cart');
        exit;
    } else {
        $_SESSION['cart'][$_GET['id']]['quantity'] += 1;
        header('Location: cart');
        exit;
    }
} elseif ($_GET['action'] === 'delete') {
    unset($_SESSION['cart'][$_GET['id']]);
    header('Location: cart');
    exit;
}

require_once 'views/product.view.php';