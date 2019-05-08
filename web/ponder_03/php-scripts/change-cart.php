<?php
session_start();
if (isset($_SESSION['cart']) && isset($_POST['index'])) {
  if ($_POST['state'] == 'delete') {
    unset($_SESSION['cart'][$_POST['index']]);
    if (count($_SESSION['cart']) == 0) {
      unset($_SESSION['cart']);
    }
  } else {
    $_SESSION['cart'][$_POST['index']]['itemCount'] = $_POST['itemCount'];
  }
}
header('Location: ../cart.php');
?>