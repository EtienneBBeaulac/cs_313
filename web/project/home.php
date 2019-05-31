<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: logout.php');
}
require 'database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['insert'])) {
    $name = test_input($_POST['insert']['bm_name']);
    $url = test_input($_POST['insert']['bm_url']);
    if (strpos($url, 'http://') == false || strpos($url, 'https://') == false) {
      $url = 'http://' . $url;
    }
    if (preg_match("/[0-9a-zA-Z_]{1,}$/", $name) && filter_var($url, FILTER_VALIDATE_URL)) {
      $id = $_SESSION['login']['id'];
      $sql_insert = "INSERT INTO user_bookmark (user_id, bookmark_name, bookmark_url) VALUES ({$id}, '{$name}', '{$url}')";
      if ($db->exec($sql_insert) === false) {
        echo "Error occured"; // TODO: make this nicer
      }
    } else {
      echo 'problem';
      // do something
    }
  } else if (isset($_POST['update'])) { }
}

function matchesSearch($term, $search, $percentage)
{
  $term = strtoupper($term);
  $search = strtoupper($search);

  if (strpos($term, $search) !== false) {
    return true;
  }

  similar_text($term, $search, $percent);
  if ($percent > $percentage) {
    return true;
  }

  similar_text($search, $term, $percent);
  if ($percent > $percentage) {
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
  <?php include 'navbar.php'; ?>
  <div class="container bookmarks-container">
    <?php
    $stmt = $db->prepare('SELECT id, bookmark_name, bookmark_url FROM user_bookmark WHERE user_id=:user_id');
    $stmt->execute(array(':user_id' => $_SESSION['login']['id']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
      require 'fragments/bookmarks-utilities.php';
    } else {
      echo '<h2 class="text-center">Add a bookmark.</h2>';
    }
    if (!empty($rows)) {
      $search = isset($_GET['search']) ? test_input($_GET['search']) : '';
      echo '<div class="container">';
      require 'fragments/add-bookmark-button.php';
      $index = count($rows);
      while ($index) {
        $bm = $rows[--$index];
        if ($search == '' || matchesSearch($bm['bookmark_name'], $search, 30)) {
          require 'fragments/single-bookmark.php';
        }
      }
      echo '</div>';
    }
    ?>
  </div>
  <?php require 'bootstrap-bottom.php' ?>
</body>

</html>