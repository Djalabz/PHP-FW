<?php

session_start();

require_once 'dotenv.php';
require_once './db_config.php';

$url = 'https://pokeapi.co/api/v2/pokemon?limit=40';
// $url = "http://www.omdbapi.com/?apikey=$key=$movie&page=1";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    // var_dump($e);
} else {
    $decoded = json_decode($resp, true);
    // print_r($decoded['results']);
    $results = $decoded['results'];

    $pokemonUrls = array_column($results, 'url');

    $data = [];

    foreach($pokemonUrls as $url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        
    
        $pokemonData = json_decode($response, true);
        // $image = $pokemonData['sprites']['front_default'];
        // $name = $pokemonData['name'];
        $infos = ['name' => $pokemonData['name'], 'image' => $pokemonData['sprites']['front_default']];
        $data[] = $infos;
        curl_close($ch);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);

    $stmt = $pdo->prepare("INSERT INTO pokemon (name, image, user_id) VALUES (?, ?, ?)");
    $stmt->execute(array($_POST['name'], $_POST['image'], $_SESSION['user']['id']));
}

if ($_GET['display'] === 'list') {
    $sql = "SELECT * FROM pokemon INNER JOIN users ON users.id = pokemon.user_id";
    $list = $pdo->query($sql)->fetchAll();
    print_r($result);
}



require_once 'views/projects.view.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['movie'])) {
//     $movie = $_POST['movie'];
//     $key = $_SERVER['OMDB_APIKEY'];
//     $url = "http://pokeapi.co/api/v2/pokemon?limit=100";
//     // $url = "http://www.omdbapi.com/?apikey=$key=$movie&page=1";

//     $ch = curl_init($url);

//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//     $resp = curl_exec($ch);

//     if ($e = curl_error($ch)) {
//         var_dump($e);
//     } else {
//         $decoded = json_decode($resp, true);
//         var_dump($decoded);
//         print_r($decoded['results']);
//         $results = $decoded['results'];
//     }

//     curl_close($ch);
// }




