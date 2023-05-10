<?php

// Créer une page boutique.php, et désginer les variables avec les infos disponibles
$vetements = [ 
    "jeans" => 30, 
    "chaussures" => 50, 
    "pantalons" => 40, 
    "tshirts" => 15 
];

// Statut de départ pour la boutique    
$boutiqueOpen = true;

// Limite des stocks 
$nbrMaxJeans = 20;
$nbrMaxPants = 35;

// Au départ rien de vendus
$nbrJeansVendus = 0;
$nbrPantsVendus = 0;
$nbrTshirtsVendus = 0;
$nbrChaussuresVendus = 0;

// Promo -25% à partir du 15eme pantalon vendu
$PantsPromo = 0.75;

// Bénéfices nulles au départ
$benefs = 0;


// Premiere étape : Je veux incrémenter et afficher la variable nbrJeansVendus tant qu'il y a des Jeans en stock
// while ( $nbrJeansVendus <= $nbrMaxJeans ) {
//     $nbrJeansVendus ++;
//     echo $nbrJeansVendus;
//     echo "<br />";
// }

// echo $benefs;

// Deuxième étape : Je veux incrémenter à la fois nbrJeansVendus et nbrPantsVendus tant qu'il y a encore des stocks pour l'un ET l'autre
// while ($nbrJeansVendus < $nbrMaxJeans && $nbrPantsVendus < $nbrMaxPants) {
//     $nbrJeansVendus ++;
//     $nbrPantsVendus ++;
//     echo $nbrJeansVendus . " " . $nbrPantsVendus;
//     echo "<br />";
// }

// // Troisième étape : Je souhaiterais que ma boutique soit fermée lorsque mes jeans OU mes pantalons sont en rupture des stocks. 
// // Je souhaites également afficher un message adequat type "Nous sommes fermés ! - Nous sommes ouverts !" entre des balises h1
// // Je souhaite aussi faire passer ma variable $boutiqueOpen de true à false selon la situation
if ($nbrJeansVendus > $nbrMaxJeans || $nbrPantsVendus > $nbrMaxPants) {
    $boutiqueOpen = false;
    echo "<h1>On est fermé !</h1>";
    
} else {
    $boutiqueOpen = true;
    echo "<h1>On est ouvert !</h1>";
}


// // Quatrième étape : J'aimerais afficher les benefs avec les jeans seulement et en prenant en compte la limite des stocks
// while ($nbrJeansVendus < $nbrMaxJeans) {
//     $nbrJeansVendus ++;
//     $benefs += $vetements["jeans"]; 
// }

// echo "jeans : " . $benefs . " euros";
// echo "<br>";

// for ($i=1; $i<=$nbrMaxJeans; $i++) {
//     $benefs += $vetements["jeans"];
// }
//  echo $benefs; 
//  echo "<br>";


// // Cinquième étape : Y ajouter les Pants dans la meme logique
// while ($nbrJeansVendus < 20 && $nbrPantsVendus < 35) {
//     $nbrJeansVendus ++;
//     $nbrPantsVendus ++;

    // $benefs += $vetements["jeans"];
    // $benefs += $vetements["pantalons"];

    // echo $nbrJeansVendus;
    // echo $nbrPantsVendus;
// }




// // 6eme etape : Prendre en compte la réduction sur les Pants lors du calcul 
while ($nbrJeansVendus < $nbrMaxJeans && $nbrPantsVendus < $nbrMaxPants) {
    $nbrJeansVendus ++;
    $nbrPantsVendus ++;
    $nbrTshirtsVendus ++;
    $nbrChaussuresVendus ++;


    if ( $nbrPantsVendus >= 15 ) {
        $benefs += $vetements["chaussures"];
        $benefs += $vetements["tshirts"];
        $benefs += $vetements["jeans"];
        $benefs += ($vetements["pantalons"] * 0.75);
        
    } else {
        $benefs += $vetements["chaussures"]; // $benefs += array-sum($vetements);
        $benefs += $vetements["tshirts"];
        $benefs += $vetements["jeans"];
        $benefs += $vetements["pantalons"];
    }
}

echo "benefices jeans et pants : " . $benefs . " euros";
echo "<br/>";


// // 7eme etape : Avec une boucle, afficher chaque vetement et prix du tableau sous la forme "Les $vetement c'est $prix Euros"  
foreach ($vetements as $key => $prix) {
    echo "Les " . $key . " c'est " . $prix . " Euros" ;
    echo "<br/>";
}


// // 8eme etape : Créer un index.php dans lequel on va importer notre code avec include()


