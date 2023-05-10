<?php

function numerosLoto() {

  $numbers = [];

  for ($index = 0; $index < 5; $index++) {

    $numbers[] = mt_rand(1, 49);
  }

  $numbers[] = mt_rand(1, 10);

  return $numbers;
}

$loto = numerosLoto();

print_r($loto);
echo "</br>";

foreach ($loto as $number) {
    echo $number;
    echo "</br>";
}


function numerosGrillesLoto($nbGrilles) {

  $grilles = [];

  for ($i=0; $i < $nbGrilles; $i++) {
    $grilles[] = numerosLoto();
  }

  return $grilles;
}

$test = numerosGrillesLoto(8);

print_r($test);

// foreach ($test as $grille) {
//     print_r($grille);
//     echo "</br>";
// }



