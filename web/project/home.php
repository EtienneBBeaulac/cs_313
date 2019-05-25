<?php
session_start();
// $_SESSION['login'] = "";
if (!isset($_SESSION['login'])) {
  header('Location: logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bookmarkz</title>
  <?php require 'header-links.php' ?>
</head>

<body>
  <?php include 'navbar.php';
  require 'database-connection.php'; ?>
  <div class="container bookmarks-container">
    <?php
    $stmt = $db->prepare('SELECT bookmark_name, bookmark_url FROM user_bookmark WHERE user_id=:user_id');
    $stmt->execute(array(':user_id' => $_SESSION['login']['id']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
      require 'fragments/bookmarks-utilities.php';

      foreach ($rows as $bm) {
        require 'fragments/single-bookmark.php';
      }
    } else {
      echo "You have no bookmarks";
    }
    ?>
  </div>
  <?php require 'bootstrap-bottom.php' ?>
</body>

</html>