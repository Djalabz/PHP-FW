<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/projects' => 'controllers/projects.php',
    '/contact' => 'controllers/contact.php',
    '/contact/success' => 'controllers/contact-success.php',
    '/signup' => 'controllers/signup.php',
    '/signup/success' => 'controllers/signup-success.php',
    '/signout' => 'controllers/signout.php',
    '/login' => 'controllers/login.php',
    '/profile' => 'controllers/profile.php',
    '/profile/infos' => 'controllers/profile_infos.php',
    '/weather' => 'controllers/weather.php',
    '/shop' => 'controllers/shop.php',
    '/product' => 'controllers/product.php',
    '/cart' => 'controllers/cart.php'
];

(array_key_exists($uri, $routes)) ? require $routes[$uri] : require 'controllers/404.php';

?>