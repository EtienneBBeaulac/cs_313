<?php
session_start();
if (isset($_SESSION['cart']) && isset($_POST['index'])) {
  unset($_SESSION['cart'][$_POST['index']]);
  if (count($_SESSION['cart']) == 0) {
    unset($_SESSION['cart']);
  }
}
header('Location: ../cart.php');
?>