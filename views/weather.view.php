<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>

<main>
    <p>Paris</p>
    <p><?= $weatherInfos['main'] . " : " . $weatherInfos['description'] ?></p>
    <img src=<?= $imageSource ?> alt="">
</main>

<?php  
require 'partials/footer.php' 
?>