<?php

session_start();


require_once './db_config.php';

// Changement de username et email

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = ['username' => $_POST['username'],
             'email' => $_POST['email']];

    if (!empty($_POST['email'])) {
        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            die("Format de l'email non conforme");
        }
    }

    foreach($user as $name => $value) {
        if (!empty($_POST[$name])) {
            $stmt = $pdo->prepare("UPDATE users SET $name = ? WHERE id=?");
            $stmt->execute([$value, $_SESSION['id']]);
        }
        echo "$name a été modifié !<br>";
    }
}

// Changement d'avatar

if (isset($_FILES['avatar']) && ($_FILES['avatar']['error'] === UPLOAD_ERR_OK)) {
    $file_name = $_FILES['avatar']['name'];
    $file_tmp_name = $_FILES['avatar']['tmp_name'];

    $file_ext = strtolower(end(explode('.', $file_name)));
    $extensions = array("jpeg", "jpg", "png");
  
    if (in_array($file_ext, $extensions) === false) {
      $upload_error = "Veuillez télécharger un fichier JPEG ou PNG.";
      // die($upload_error);

    } else {
        $upload_dir = 'uploads/avatar/';
        $upload_path = $upload_dir . $file_name;
  
      if (move_uploaded_file($file_tmp_name, $upload_path)) {
        echo "Fichier téléchargé.";
      } else {
        $upload_error = "Erreur pendant le téléchargement.";
        die($upload_error);
      }

      $stmt = $pdo->prepare("UPDATE users SET avatar=? WHERE id=?");
      $stmt->execute([$upload_path, $_SESSION['id']]);
      $_SESSION['user']['avatar'] = $upload_path;
    }

  } else {
  $upload_error = "Erreur pendant le téléchargement.";
}

require_once 'views/profile_infos.view.php';

?>

