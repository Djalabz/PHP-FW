<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>

<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= Cart ?></h1>
        </div>
</header>

<main>
    <?php  if (!empty($cart)) : ?> 
    <?php foreach($cart as $product) : ?> 
        <h3><?= $product['title'] ?></h3>
        <img src="<?= $product['image'] ?>">
        <h4><?= $product['description'] ?></h4>
        <p><?= $product['quantity'] ?></p>
        <p><?= $product['price'] ?></p>
        <a href="/product?id=<?= $product['id'] ?>&action=delete">Supprimer</a>
    <?php endforeach ?>
    <?php else : ?>
        <p class="mt-6 ml-6">Votre panier est vide pour le moment</p>
    <?php endif ?>
</main>

<?php  
require_once 'partials/footer.php';
?>