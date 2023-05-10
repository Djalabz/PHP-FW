<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>

<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $product['title']?></h1>
        </div>
</header>

<main>
    <div class="group relative">
        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="<?= $product['image'] ?>" class="h-full w-full object-cover object-center lg:h-40 lg:w-40">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
                <span aria-hidden="true" class="absolute inset-0"></span>
                <?= $product['title'] ?>
            </h3>
            <p class="mt-1 text-sm text-gray-500"><?= substr($product['description'], 0, 60) ?> ...</p>
          </div>
          <p class="text-sm font-medium text-gray-900"><?= $product['price'] ?> $</p>
        </div>
    </div>
    <a href="/product?id=<?= $product['id'] ?>&action=add">Ajouter au panier</a>
</main>

<?php  
require_once 'partials/footer.php';
?>