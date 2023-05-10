<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>

<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Signup</h1>
        </div>
</header>

<?php if (!$checkToken) : ?>
  <div class="w-full max-w-xs m-auto mt-12">
      <h3>Un email de confirmation vous a été envoyé.</h3>
    <p class="text-center text-gray-500 text-xs">
      &copy;2023 Jalabert Corp.
    </p>
  </div>
<?php else : ?>  
  <div class="w-full max-w-xs m-auto mt-12">
      <h3>Vous etes bien enregistré !</h3>
    <p class="text-center text-gray-500 text-xs">
      &copy;2023 Jalabert Corp.
    </p>
  </div>
<?php endif ?>

<?php  
require 'partials/footer.php' 
?>