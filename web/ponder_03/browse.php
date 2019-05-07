<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <?php require "../bootstrap-includes.php"; ?>
  <script src="script.js"></script>
  <title>Browse Inventory</title>
</head>

<body>
  <?php
  $page = "browse";
  include "php-elements/header.php";
  ?>

  <div class="container top-container">
    <div class="row">
      <div class="card-columns">
        <?php
        $imgSrc = "https://m.media-amazon.com/images/I/61Ybzz3P25L._AC_UL436_.jpg";
        $imgAlt = "computer1";
        $itemDesc = "Acer Aspire TC-885-ACCFLi3O Desktop, 8th Gen Intel Core i3-8100, 8GB DDR4 + 16GB Optane Memory, 1TB HDD, 8X DVD, 802.11ac WiFi, Windows 10 Home";
        $itemId = "comp1";
        include "php-elements/item-card.php";
        ?>
        <?php
        $imgSrc = "https://m.media-amazon.com/images/I/41ZLGAJEh7L._AC_UL436_.jpg";
        $imgAlt = "computer2";
        $itemDesc = "HP 8300 Elite Small Form Factor Desktop Computer, Intel Core i5-3470 3.2GHz Quad-Core, 8GB RAM, 500GB SATA, Windows 10 Pro 64-Bit, USB 3.0, Display Port (Renewed)";
        $itemId = "comp2";
        include "php-elements/item-card.php";
        ?>
        <?php
        $imgSrc = "https://m.media-amazon.com/images/I/618oANL1phL._AC_UL436_.jpg";
        $imgAlt = "computer3";
        $itemDesc = "Acer Aspire E 15, 15.6\" Full HD, 8th Gen Intel Core i3-8130U, 6GB RAM Memory, 1TB HDD, 8X DVD, E5-576-392H";
        $itemId = "comp3";
        include "php-elements/item-card.php";
        ?>
        <?php
        $imgSrc = "https://m.media-amazon.com/images/I/71DvG2FjM+L._AC_UL436_.jpg";
        $imgAlt = "computer4";
        $itemDesc = "CyberpowerPC Gamer Xtreme VR GXiVR8060A7 Gaming PC (Intel i5-9400F 2.9GHz 8GB DDR4, NVIDIA GeForce GTX 1660 6GB, 120GB SSD, 1TB HDD, 802.11AC WiFi & Win 10 Home) Black";
        $itemId = "comp4";
        include "php-elements/item-card.php";
        ?>
        <?php
        $imgSrc = "https://m.media-amazon.com/images/I/81lI+QyoEwL._AC_UL436_.jpg";
        $imgAlt = "computer5";
        $itemDesc = "HP Elite Desktop Computer, Intel Core i5 3.1GHz, 8GB RAM, 1TB SATA HDD, Keyboard & Mouse, Wi-Fi, Dual 19in LCD Monitors (Brands Vary), DVD-ROM, Windows 10, (Upgrades Available) (Renewed)";
        $itemId = "comp5";
        include "php-elements/item-card.php";
        ?>
        <?php
        $imgSrc = "https://m.media-amazon.com/images/I/816zPbAcg0L._AC_UL436_.jpg";
        $imgAlt = "computer6";
        $itemDesc = "Dell Optiplex 990 SFF PC, Intel Core i5 Processor, 16GB RAM, 2TB HDD, DVDRW, Keyboard & Mouse, WiFi, Bluetooth 4.0, Windows 10 Pro, 20in LCD Monitor (Renewed)";
        $itemId = "comp6";
        include "php-elements/item-card.php";
        ?>
      </div>
    </div>
    
</body>

</html>