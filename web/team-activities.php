<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Team Activities</title>
</head>

<body>
  <?php
  $page = "team-activities";
  require "header.php";
  ?>
  <br>
  <div class="container text-center">
    <div class="card">
      <div class="card-header">Team Activities</div>
      <div class="list-group ">
        <a href="team_03/index.php" class="list-group-item list-group-item-action">03 Teach</a>
        <a href="team_05/home.php" class="list-group-item list-group-item-action">05 Teach</a>
        <!-- <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a> -->
      </div>
    </div>
  </div>
  <?php require "bootstrap-includes.php" ?>
</body>

</html>