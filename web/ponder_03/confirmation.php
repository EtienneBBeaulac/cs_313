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
  <title>Confirmation</title>
</head>

<body>
  <?php
  include 'php-elements/header.php';
  if (isset($_POST['billing'])) {
    $billing = $_POST['billing'];
    $bFirstName = test_input($billing['firstName']);
    $bLastName = test_input($billing['lastName']);
    $bAddress1 = test_input($billing['address1']);
    $bAddress2 = test_input($billing['address2']);
    $bCity = test_input($billing['city']);
    $bState = test_input($billing['state']);
    $bZip = test_input($billing['zip']);
  } else {
    header('Location: browse.php');
  }
  if (isset($_POST['shipping'])) {
    $shipping = $_POST['shipping'];
    if ($shipping['firstName'] === '') {
      $shipping = $billing;
    }
  } else {
    $shipping = $billing;
  }
  $sFirstName = test_input($shipping['firstName']);
  $sLastName = test_input($shipping['lastName']);
  $sAddress1 = test_input($shipping['address1']);
  $sAddress2 = test_input($shipping['address2']);
  $sCity = test_input($shipping['city']);
  $sState = test_input($shipping['state']);
  $sZip = test_input($shipping['zip']);
  if (isset($_SESSION['cart'])) {
    $order = $_SESSION['cart'];
  } else {
    header('Location: browse.php');
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <div class="container">
    <h2 class="text-center mb-3 mt-3">Order Confirmation</h2>
    <div class="row">
      <div class="col-md-4">
        <h4>Billing Address</h4>
        <ul class="list-group mb-3">
          <li class="list-group-item">
            <div>
              <h6 class="my-0"><?php echo $bFirstName . ' ' . $bLastName; ?></h6>
              <small class="text-muted">
                <div>
                  <?php echo $bAddress1 . (($bAddress2 !== null && $bAddress2 !== '') ? ', ' . $bAddress2 : ''); ?>
                </div>
                <div>
                  <?php echo $bCity . ' ' . $bState . ' ' . $bZip ?>
                </div>
              </small>
            </div>
          </li>
        </ul>
        <h4>Shipping Address</h4>
        <ul class="list-group mb-3">
          <li class="list-group-item">
            <div>
              <h6 class="my-0"><?php echo $sFirstName . ' ' . $sLastName; ?></h6>
              <small class="text-muted">
                <div>
                  <?php echo $sAddress1 . (($sAddress2 !== null && $sAddress2 !== '') ? ', ' . $sAddress2 : ''); ?>
                </div>
                <div>
                  <?php echo $sCity . ' ' . $sState . ' ' . $sZip ?>
                </div>
              </small>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-md-8">
        <h4>Order Summary</h4>
        <ul class="list-group mb-3">
          <?php
          $total = 0;
          foreach ($order as $k => $item) {
            $imgSrc = addslashes($item['imgSrc']);
            $itemDesc = addslashes($item['itemDesc']);
            $itemCount = addslashes($item['itemCount']);
            $itemId = $k;
            $itemTotal = $itemCount * 500;
            $total += $itemCount * 500;
            include 'php-elements/order-item.php';
          }
          ?>
          <div class="container">
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
        </ul>
      </div>
    </div>
  </div>

  <?php
  session_unset();
  ?>
</body>