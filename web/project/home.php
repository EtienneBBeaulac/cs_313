<?php
session_start();
// $_SESSION['login'] = "";
if (!isset($_SESSION['login'])) {
  header('Location: logout.php');
}

function matchesSearch($bm, $search) {
  $bm = strtoupper($bm);
  $search = strtoupper($search);
  
  similar_text($bm, $search, $percent);
  if ($percent > 75) {
    return true;
  }

  similar_text($search, $bm, $percent);
  if ($percent > 75) {
    return true;
  }

  return false;
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
    require 'fragments/bookmarks-utilities.php';
    $stmt = $db->prepare('SELECT bookmark_name, bookmark_url FROM user_bookmark WHERE user_id=:user_id');
    $stmt->execute(array(':user_id' => $_SESSION['login']['id']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
      $search = isset($_GET['search']) ? test_input($_GET['search']) : '';
      echo '<div class="container">';
      foreach ($rows as $bm) {
        if (matchesSearch($bm, $search)) {
          require 'fragments/single-bookmark.php';
        }
      }
      echo '</div>';
    } else {
      echo "You have no bookmarks";
    }
    ?>
  </div>
  <?php require 'bootstrap-bottom.php' ?>
</body>

</html>