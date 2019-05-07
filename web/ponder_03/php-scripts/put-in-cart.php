<?php
  session_start();
  if (isset($_POST['form'])) {
    if (isset($_SESSION['cart'])) {
      array_push($_SESSION['cart'], $_POST['form']);
    } else {
      $_SESSION['cart'] = array($_POST['form']);
    }
  }
  header('Location: ../browse.php')
?>