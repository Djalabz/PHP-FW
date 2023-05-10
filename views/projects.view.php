<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>

<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pokedex</h1>
        </div>
</header>

<main>
    <!-- <form method="POST" class="bg-gray shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input name="movie" class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="movie" type="text" placeholder="Search movie..." required>
        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Go
      </button>
    </form> -->
    <?php if (empty($_GET['display'])) : ?>
      <div class="grid grid-cols-6">
          <?php foreach($data as $pokemon) :  ?>
            <form method="POST">
              <div class="card">
                  <p><?= $pokemon['name'] ?></p>
                  <img src="<?= $pokemon['image'] ?>" alt="">
              </div>
              <input type="hidden" name="name" value=<?= $pokemon['name'] ?>>
              <input type="hidden" name="image" value=<?= $pokemon['image'] ?>>
              <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ajouter
              </button>
            </form>
          <?php endforeach ?>
      </div>
    <?php elseif ($_GET['display'] === 'list') : ?>
      <div class="grid grid-cols-6">
          <?php foreach($list as $pokemon) :  ?>
            <form method="POST">
              <div class="card">
                  <p><?= $pokemon['name'] ?></p>
                  <img src="<?= $pokemon['image'] ?>" alt="">
              </div>
              <input type="hidden" name="name" value=<?= $pokemon['name'] ?>>
              <input type="hidden" name="image" value=<?= $pokemon['image'] ?>>
              <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Supprimer
              </button>
            </form>
          <?php endforeach ?>
      </div>
    <?php endif ?>
</main>

<?php  
require_once 'partials/footer.php';
?>