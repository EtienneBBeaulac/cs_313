<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Browse Inventory</title>
</head>

<body>
  <?php
  $page = "cart";
  include "php-elements/header.php";
  ?>
  <div class="container">
    <h1 class="text-center mb-5 mt-3">Cart</h1>
    <div class="list-group">
      <div class="list-group-item header <?php echo (!isset($_SESSION['cart']) ? "d-none" : ""); ?>">
        <div class="row">
          <div class="col-sm-9 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">Item name</div>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-1 align-self-center text-center">Quantity</div>
          <div class="col-sm-1 align-self-center text-center">Price</div>
        </div>
      </div>
      <?php
      if (isset($_SESSION['cart'])) {
        $total = 0;
        foreach ($_SESSION['cart'] as $k => $item) {
          $imgSrc = addslashes($item['imgSrc']);
          $itemDesc = addslashes($item['itemDesc']);
          $itemCount = addslashes($item['itemCount']);
          $itemId = $k;
          $total += $itemCount * 500;
          include 'php-elements/cart-item.php';
        }
      } else {
        echo '<h2 class="text-center empty-cart">Your cart is empty</h2>';
        echo '<a class="btn btn-primary browse-btn" href="browse.php">Go browse</a>';
      }
      ?>
    </div>
  </div>
  <div class="container <?php echo (!isset($_SESSION['cart']) ? "d-none" : "") ?>">
  <br>
    <div class="row text-right">
      <div class="col-sm-9">Subtotal</div> 
      <div class="col-sm-3">$<?php echo number_format((float)$total, 2, '.', ''); ?></div>
    </div>
    <div class="row text-right">
      <div class="col-sm-9">Tax (6%)</div>
      <div class="col-sm-3">$<?php echo number_format((float)$total * 0.06, 2, '.', '') ?></div>
    </div>
    <div class="row text-right">
      <div class="col-sm-9">Shipping</div>
      <div class="col-sm-3">$0.00</div>
    </div>
    <div class="row text-right bold">
      <div class="col-sm-9">Grand total</div>
      <div class="col-sm-3">$<?php echo number_format((float)$total * 1.06, 2, '.', '') ?></div>
    </div>
    <br>
    <div class="row text-right">
      <div class="col-sm-9"></div>
      <div class="col-sm-3"><a class="btn btn-success" href="checkout.php">Checkout</a></div>
    </div>
  </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js" type="text/javascript"></script>
  <script src="script.js" type="text/javascript"></script>
  <?php require "../bootstrap-includes.php"; ?>
</body>

</html>