
<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>


<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Profil de <?= $_SESSION['user']['username'] ?></h1>
        </div>
</header>

<div class="w-full max-w-xs m-auto mt-12">


</div>

<?php  
require 'partials/footer.php' 
?>