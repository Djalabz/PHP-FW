<?php 

$substantif = ['Le cadavre', 'Le tracteur', 'Le pigeon', 'La grand mère'];
$adjectif = ['exquis', 'jaune', 'flexible', 'excentrique'];
$verbe = ['mange', 'évite', 'partage', 'rencontre'];

function randomWord($array) {
    $index = mt_rand(0, count($array) - 1);
    return $array[$index];
}

$sub1 = randomWord($substantif);
$adj1 = randomWord($adjectif);
$verbe1 = randomWord($verbe);
$sub2 = randomWord($substantif);
$adj2 = randomWord($adjectif);

echo $sub1 . ' ' . $adj1 . ' ' . $verbe1 . ' ' . $sub2 . ' ' . $adj2 . PHP_EOL;