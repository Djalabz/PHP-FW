
<?php 
require 'partials/head.php'; 
require 'partials/nav.php';
?>

<header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Infos</h1>
        </div>
</header>

<div class="w-1/2 m-auto mt-12">
  <form method='POST' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username : <?= $_SESSION['user']['username'] ?>
      </label>
      <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="../controllers/">
        Change username
      </a>
      <!-- <input name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" required> -->
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Avatar
      </label>
      <img class="h-20 w-20 mt-4 mb-4 rounded-full" src="../<?= $_SESSION['user']['avatar'] ?>" alt="">
      <input type="file" name="avatar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      <!-- <input name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" required> -->
      <?php if (!empty($upload_error)) : ?>
        <p class="text-red-700 mt-3 ml-2"><?= $upload_error ?></p>
      <?php endif ?>
    </div>
    <div class="mb-6">
      <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="../controllers/">
        Change password
      </a>
      <a class="block align-baseline font-bold text-sm text-gray-700 mt-4 hover:text-blue-800" href="../controllers/">
        Forgotten Password ?
      </a>
      <!-- <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="************" required> -->
      <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
    </div>
    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Save changes
    </button>
  </form>
</div>

<?php  
require 'partials/footer.php' 
?>