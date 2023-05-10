<?php 


require_once 'dotenv.php';
require_once 'functions.php';
require_once './db_config.php';

$url = 'https://fakestoreapi.com/products';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    var_dump($e);
} else {
    $products = json_decode($resp, true);
}

require_once 'views/shop.view.php';