<link rel="stylesheet" href="style.css">
<?php date_default_timezone_set("America/Boise"); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Etienne Beaulac</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link <?php echo ($page == "home" ? "active" : "")?>" href="./index.php">Home <span class="sr-only">About Me</span></a>
      <a class="nav-item nav-link <?php echo ($page == "assignments" ? "active" : "")?>" href="./assignments.php">Assignments</a>
    </div>
  </div>
  <span class="navbar-text"><?php echo date("D, M d Y - h:i:sa"); ?></span>
</nav>