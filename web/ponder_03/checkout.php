<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Checkout</title>
</head>

<body class="bg-light">
  <?php
  include 'php-elements/header.php';
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-2 align-self-center"><a class="btn btn-danger" href="cart.php"><i class="fas fa-angle-left"></i> Back to cart</a></div>
      <div class="col-md-8 text-center mb-3 mt-3">
        <h2>Checkout</h2>
      </div>
    </div>
    <hr class="mb-4">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h4 class="mb-3">Billing Address</h4>
        <form action="confirmation.php" method="post">
          <?php
          $addressType = 'billing';
          require 'php-elements/checkout-form.php';
          ?>
          <!-- <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input class="form-control" type="text" name="firstName" id="first-name" placeholder value required>
              <div class="invalid-feedback">Valid first name is required</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input class="form-control" type="text" name="lastName" id="lastName" placeholder value required>
              <div class="invalid-feedback">Valid last name is required</div>
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder value required>
            <div class="invalid-feedback">Valid email is required</div>
          </div>
          <div class="mb-3">
            <label for="address1">Address</label>
            <input class="form-control" type="text" name="address1" id="address1" placeholder value required>
            <div class="invalid-feedback">Valid address is required</div>
          </div>
          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input class="form-control" type="text" name="address2" id="address2" placeholder value>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="city">City</label>
              <input class="form-control" type="text" name="city" id="city" placeholder value required>
              <div class="invalid-feedback">Valid city is required</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="zip">Zip</label>
              <input class="form-control" type="text" name="zip" id="zip" placeholder value required>
              <div class="invalid-feedback">Valid zip code is required</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="country">Country</label>
              <input class="form-control" type="text" name="country" id="country" placeholder value required>
              <div class="invalid-feedback">Valid country is required</div>
            </div>
          </div> -->
          <hr class="mb-4">
          <h4 class="mb-3">Shipping Address</h4>
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" name="sameBilling" id="sameBilling">
            <label for="sameBilling" class="custom-control-label">Same as billing address</label>
          </div>
          <div id="shippingContainer">
            <?php
            $addressType = 'shipping';
            require 'php-elements/checkout-form.php';
            ?>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Finish checkout</button>
        </form>
      </div>
      </form>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js" type="text/javascript"></script>
  <script src="script.js" type="text/javascript"></script>
</body>

</html>