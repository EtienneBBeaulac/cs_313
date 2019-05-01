<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Etienne Beaulac</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="<?php echo ($page == "home" ? "active" : "")?>"><a href="./index.php">About Me</a></li>
      <li class="<?php echo ($page == "assignments" ? "active" : "")?>"><a href="./assignments.php">Assignments</a></li>
    </ul>
  </div>
</nav>