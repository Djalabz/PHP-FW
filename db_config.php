<?php 

require_once 'dotenv.php';

$dbhost = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$dbuser = $_ENV['DB_USERNAME'];
$dbpassword = $_ENV['DB_PASSWORD'];

$dsn = "mysql:dbname=$dbname;host=$dbhost"; 

try {
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
    
} catch (PDOException $error) {
    return "Il y a une erreur : " . $error . "<br>";
    die();
}


