<?php

require_once 'dotenv.php';

$url = 'https://api.openweathermap.org/data/2.5/weather?q=Paris&appid=28a46ed081fa271f6e1f3b7415825368';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    var_dump($e);
} else {
    $decoded = json_decode($resp, true);
    var_dump($decoded);

    $weatherInfos = $decoded['weather'][0];
    $weatherId = $decoded["cod"];

    if ($weatherId <= 232 && $weatherId >= 200) {
        $imageSource =  'https://openweathermap.org/img/wn/11d@2x.png';
    } else if ($weatherId <= 531 && $weatherId >= 300) {
        $imageSource = 'https://openweathermap.org/img/wn/10d@2x.png';
    } 
    else if ($weatherId <= 622 && $weatherId >= 600) {
        $imageSource = 'https://openweathermap.org/img/wn/13d@2x.png';
    } else if ($weatherId === 800) {
        $imageSource = 'https://openweathermap.org/img/wn/01d@2x.png';
    } else if ($weatherId <= 804 && $weatherId > 800){
        $imageSource = 'https://openweathermap.org/img/wn/02d@2x.png';
    }
}

require_once 'views/weather.view.php';