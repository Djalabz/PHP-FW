<?php

$substantif = ['le cadavre', 'le tracteur', 'Le pigeon','La grand-mère', 'le tonton' ];
$adjectif = ['exquis', 'vert', 'troublant', 'pourri'];
$verbe = ['brûle', 'démontera', 'fumera', 'monte'];


function randomWord($type) {
    $index = mt_rand(0, count($type) - 1);
    return $type[$index];
}

$sub1 = randomWord($substantif); 
$adj1 = randomWord($adjectif);
$verbe = randomWord($verbe);
$sub2 = randomWord($substantif);
$adj2 = randomWord($adjectif);

echo $sub1 . " " . $adj1 . " " . $verbe . " " . $sub2 . " " . $adj2;