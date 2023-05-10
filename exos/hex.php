
<?php

$valeursHexa = [
  '0', '1', '2', '3',
  '4', '5', '6', '7',
  '8', '9', 'a', 'b',
  'c', 'd', 'e', 'f'
];

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuances de couleurs</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>

        <h2>Nuances de gris</h2>
        <?php for ($i = 0; $i < count($valeursHexa); $i++): ?>    
        <div class="box" style="background-color: #<?= $valeursHexa[$i].$valeursHexa[$i].$valeursHexa[$i] ?>;"></div>
        <?php endfor; ?>

        <h2>Toutes les couleurs</h2>
        <?php
        for ($r = 0; $r < count($valeursHexa); $r++):
            for ($v = 0; $v < count($valeursHexa); $v++):
                for ($b = 0; $b < count($valeursHexa); $b++):
        ?>
        <div class="box" style="background-color: #<?= $valeursHexa[$r].$valeursHexa[$v].$valeursHexa[$b] ?>;"></div>
        <?php
        endfor;
            endfor;
                endfor;
        ?>

    </body>
    <style>
        body {
            margin: 0;
            font-family: Helvetica, Arial, sans-serif;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        h2 {
            margin : 20px 0 20px 0;
            font-weight: bold;
            font-size: 40px;
            width: 100%;
        }
        .box {
            height: 50px;
            border: 1px solid black;
            box-sizing: border-box;
            margin: 2px;
            width: calc(100% / 16 - 5px);
        }
    </style>
</html>
