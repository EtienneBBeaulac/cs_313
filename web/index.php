<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Etienne Beaulac</title>
</head>
<body>
  <?php 
    $page = "home";
    require "header.php";
  ?>
  <div class="container">
    <div class="card full-page row justify-content-center">
    <?php require "carousel.php" ?>
      <div class="card-body">
        <h1 class>Call me ET</h1>
      </div>
    </div>
  </div>
  <?php require "bootstrap-includes.php" ?>
</body>
</html>