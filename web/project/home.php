<?php
session_start();
$_SESSION['login'] = "";
if (!isset($_SESSION['login'])) {
  header('Location: login-screen.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bookmarkz</title>
  <?php include 'header-links.php' ?>
</head>

<body>
  <?php include 'navbar.php';
  include 'database-connection.php'; ?>
<div class="container bookmarks-container">
  <?php
  foreach ($db->query('SELECT username, password FROM user_account') as $row)
  {
    echo 'user: ' . $row['username'];
    echo ' password: ' . $row['password'];
    echo '<br/>';
  }
  $bookmarks = [['name' => 'bookmark1', 'url' => 'http://www.google.com'], ['name' => 'bookmark2', 'url' => 'http://www.amazon.com']];
  foreach ($bookmarks as $bm) {
    include 'fragments/single-bookmark.php';
  }
  ?>
</div>
  <?php include 'bootstrap-bottom.php' ?>
</body>

</html>